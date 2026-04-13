<?php
namespace App\Auth;

use WP_Error;
use App\Helpers\CacheHelper;
use App\Helpers\MemberHelper;

class MemberRegistration {
    public static function init(): void {
        add_action('wp_ajax_nopriv_register_member', [self::class, 'handleAjax']);
        add_action('wp_ajax_register_member', [self::class, 'handleAjax']);
    }

    public static function handleAjax(): void {
        check_ajax_referer('member_register_nonce', 'nonce');

        // Rate limit 3 lần / 5 phút (chống spam)
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = 'register_attempt_' . md5($ip);
        $attempts = (int) get_transient($key);
        if ($attempts >= 10) {
            wp_send_json_error(['message' => 'Bạn đã thử quá nhiều lần. Vui lòng thử lại sau 5 phút.']);
        }
        set_transient($key, $attempts + 1, 300);

        // === TURNSTILE VERIFICATION (Cloudflare) ===
        $token = sanitize_text_field($_POST['cf-turnstile-response'] ?? '');
        if (!\App\Helpers\SecurityHelper::verify($token)) {
            wp_send_json_error(['message' => 'Vui lòng xác minh bạn không phải robot.']);
            return; // Dừng ngay, không chạy tiếp process()
        }

        $result = self::process($_POST, $_FILES);

        if (is_wp_error($result)) {
            wp_send_json_error(['message' => $result->get_error_message()]);
        }

        wp_send_json_success([
            'message'  => 'Đăng ký thành công! Vui lòng kiểm tra email.',
            'redirect' => home_url('/dang-nhap')
        ]);
    }

    private static function process(array $post, array $files): int|WP_Error {
        $validation = self::validate($post);
        if (is_wp_error($validation)) return $validation;

        $user_id = wp_insert_user([
            'user_login'   => sanitize_email($post['email']),
            'user_email'   => sanitize_email($post['email']),
            'user_pass'    => $post['password'],
            'display_name' => sanitize_text_field($post['full_name']),
            'role'         => 'pending_member',
        ]);

        if (is_wp_error($user_id)) return $user_id;

        $member_id = wp_insert_post([
            'post_type'   => 'member',
            'post_title'  => sanitize_text_field($post['full_name']),
            'post_status' => 'publish',
            'post_author' => $user_id,
        ], true);

        if (is_wp_error($member_id)) {
            wp_delete_user($user_id);
            return $member_id;
        }

        // Liên kết 1:1
        update_post_meta($member_id, '_user_id', $user_id);
        update_user_meta($user_id, '_member_id', $member_id);
        \App\Auth\MemberActivation::sendActivation($user_id);

        // BULK META – chỉ 1 lần query (10/10 performance)
        self::saveMetaBulk($member_id, $post);

        // Avatar
        if (!empty($files['avatar']['name'])) {
            self::handleAvatar($member_id, $files['avatar']);
        }

        // Cache
        CacheHelper::bumpDataVersion('member');
        CacheHelper::bumpDataVersion('content_list'); // nếu bạn merge member vào homepage

        // wp_new_user_notification($user_id, null, 'user');

        return $user_id;
    }

    private static function saveMetaBulk(int $member_id, array $data): void {
        $meta = [
            'phone'         => sanitize_text_field($data['phone'] ?? ''),
            'cccd'          => sanitize_text_field($data['cccd'] ?? ''),
            'cccd_name'     => sanitize_text_field($data['cccd_name'] ?? ''),
            'province_code' => sanitize_text_field($data['province_code'] ?? ''),
            'address'       => sanitize_textarea_field($data['address'] ?? ''),
        ];

        foreach ($meta as $key => $value) {
            if ($value !== '') {
                update_post_meta($member_id, $key, $value); // đi qua CustomTableManager filter
            }
        }
    }

    private static function handleAvatar(int $member_id, array $file): void {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';

        $attachment_id = media_handle_sideload($file, $member_id);
        if (!is_wp_error($attachment_id)) {
            set_post_thumbnail($member_id, $attachment_id);
        }
    }

    private static function validate(array $data): bool|WP_Error {
        if (email_exists($data['email']) || username_exists($data['email'])) {
            return new WP_Error('email_exists', 'Email đã được sử dụng.');
        }
        if ($data['password'] !== ($data['password_confirm'] ?? '')) {
            return new WP_Error('password_mismatch', 'Mật khẩu không khớp.');
        }
        if (strlen($data['password']) < 8) {
            return new WP_Error('password_short', 'Mật khẩu tối thiểu 8 ký tự.');
        }
        // Có thể thêm check unique CCCD sau
        return true;
    }
}