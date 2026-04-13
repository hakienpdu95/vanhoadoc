<?php
namespace App\Auth;

use WP_Error;
use App\Helpers\EmailHelper;
use App\Helpers\CacheHelper;

class MemberActivation {
    public static function init(): void {
        add_action('wp_ajax_nopriv_resend_activation', [self::class, 'resendAjax']);
        add_action('wp_ajax_resend_activation', [self::class, 'resendAjax']);

        add_action('template_redirect', [self::class, 'handleActivationLink']);

        add_filter('authenticate', [self::class, 'blockUnactivatedLogin'], 30, 3);
    }

    public static function sendActivation(int $user_id): void {
        $token = bin2hex(random_bytes(32));
        $hashed = wp_hash_password($token);

        update_user_meta($user_id, 'activation_token', $hashed);
        update_user_meta($user_id, 'is_activated', 0);

        $link = home_url('/kich-hoat?token=' . $token . '&user=' . $user_id);

        EmailHelper::send(
            get_userdata($user_id)->user_email,
            'Kích hoạt tài khoản - ' . get_bloginfo('name'),
            'partials.auth.email.activation',
            [
                'link' => $link,
                'name' => get_user_meta($user_id, 'full_name', true) ?: get_userdata($user_id)->display_name
            ]
        );
    }

    public static function handleActivationLink(): void {
        if (!is_page('kich-hoat')) return;

        if (request()->has('success') || request()->has('error')) return;

        $token   = sanitize_text_field($_GET['token'] ?? '');
        $user_id = (int) ($_GET['user'] ?? 0);

        if (!$token || !$user_id) {
            wp_safe_redirect(home_url('/kich-hoat?error=invalid'));
            exit;
        }

        $saved_hash = get_user_meta($user_id, 'activation_token', true);

        if (empty($saved_hash) || !wp_check_password($token, $saved_hash)) {
            wp_safe_redirect(home_url('/kich-hoat?error=expired'));
            exit;
        }

        // Kích hoạt thành công
        update_user_meta($user_id, 'is_activated', 1);
        update_user_meta($user_id, 'email_verified_at', current_time('mysql'));
        delete_user_meta($user_id, 'activation_token');

        $user = new \WP_User($user_id);
        $user->remove_role('pending_member');
        $user->add_role('member');

        $member_id = \App\Helpers\MemberHelper::getMemberIdByUserId($user_id);
        if ($member_id) {
            update_post_meta($member_id, 'is_activated', 1);
            CacheHelper::bumpDataVersion('member');
        }

        \App\Auth\MemberPermissions::grantMemberAccess($user_id);
        
        wp_safe_redirect(home_url('/kich-hoat?success=1'));
        exit;
    }

    public static function blockUnactivatedLogin($user, $username, $password) {
        if (!$user instanceof \WP_User) return $user;
        
        if (in_array('administrator', (array)$user->roles)) {
            return $user;
        }

        if (get_user_meta($user->ID, 'is_activated', true) != 1) {
            return new WP_Error('not_activated', 'Tài khoản chưa được kích hoạt. Vui lòng kiểm tra email.');
        }
        return $user;
    }

    public static function resendAjax(): void {
        check_ajax_referer('resend_activation_nonce', 'nonce');

        $email = sanitize_email($_POST['email'] ?? '');

        if (empty($email) || !is_email($email)) {
            wp_send_json_error(['message' => 'Email không hợp lệ.']);
            return;
        }

        // === RATE LIMITING (chống spam) ===
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $rate_key = 'resend_activation_rate_limit_' . md5($ip . $email);
        $attempts = (int) get_transient($rate_key);

        if ($attempts >= 3) {
            wp_send_json_error(['message' => 'Bạn đã yêu cầu gửi lại link quá nhiều lần. Vui lòng thử lại sau 5 phút.']);
            return;
        }

        set_transient($rate_key, $attempts + 1, 300); // 5 phút
        // =================================

        $user = get_user_by('email', $email);
        if (!$user || get_user_meta($user->ID, 'is_activated', true) == 1) {
            wp_send_json_error(['message' => 'Email không tồn tại hoặc đã được kích hoạt.']);
            return;
        }

        self::sendActivation($user->ID);
        wp_send_json_success(['message' => 'Đã gửi lại link kích hoạt. Vui lòng kiểm tra email.']);
    }
}