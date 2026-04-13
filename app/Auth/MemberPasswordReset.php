<?php
namespace App\Auth;

use App\Helpers\EmailHelper;

class MemberPasswordReset {
    public static function init(): void {
        add_action('wp_ajax_forgot_password', [self::class, 'handleForgotAjax']);
        add_action('wp_ajax_nopriv_forgot_password', [self::class, 'handleForgotAjax']);

        add_action('wp_ajax_reset_password', [self::class, 'handleResetAjax']);
        add_action('wp_ajax_nopriv_reset_password', [self::class, 'handleResetAjax']);

        add_action('template_redirect', [self::class, 'handleResetLink']);
    }

    public static function handleForgotAjax(): void {
        check_ajax_referer('forgot_nonce', 'nonce');

        $email = sanitize_email($_POST['email'] ?? '');

        if (empty($email) || !is_email($email)) {
            wp_send_json_error(['message' => 'Email không hợp lệ.']);
            return;
        }

        // === RATE LIMITING (chống spam) ===
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $rate_key = 'forgot_rate_limit_' . md5($ip . $email);
        $attempts = (int) get_transient($rate_key);

        if ($attempts >= 3) {
            wp_send_json_error(['message' => 'Bạn đã yêu cầu quá nhiều lần. Vui lòng thử lại sau 5 phút.']);
            return;
        }

        set_transient($rate_key, $attempts + 1, 300); // 5 phút
        // =================================

        $user = get_user_by('email', $email);
        if (!$user) {
            wp_send_json_success(['message' => 'Nếu email tồn tại, chúng tôi đã gửi link đặt lại mật khẩu.']);
            return;
        }

        $key = get_password_reset_key($user);
        $link = home_url("/quen-mat-khau?action=reset&key=$key&login=" . urlencode($user->user_login));

        $sent = EmailHelper::send(
            $email,
            'Đặt lại mật khẩu - ' . get_bloginfo('name'),
            'partials.auth.email.reset-password',
            ['link' => $link, 'name' => $user->display_name]
        );

        if ($sent) {
            wp_send_json_success(['message' => 'Link đặt lại mật khẩu đã được gửi đến email của bạn.']);
        } else {
            wp_send_json_error(['message' => 'Không thể gửi email. Vui lòng thử lại sau.']);
        }
    }

    public static function handleResetAjax(): void {
        check_ajax_referer('reset_password_nonce', 'nonce');

        $key   = sanitize_text_field($_POST['key'] ?? '');
        $login = sanitize_text_field($_POST['login'] ?? '');
        $new_pass = $_POST['new_password'] ?? '';

        $user = check_password_reset_key($key, $login);
        if (is_wp_error($user)) {
            wp_send_json_error(['message' => 'Link đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.']);
            return;
        }

        if (empty($new_pass) || strlen($new_pass) < 8) {
            wp_send_json_error(['message' => 'Mật khẩu phải ít nhất 8 ký tự.']);
            return;
        }

        reset_password($user, $new_pass);

        wp_send_json_success([
            'message' => 'Mật khẩu đã được cập nhật thành công. Bạn có thể đăng nhập ngay.'
        ]);
    }

    public static function handleResetLink(): void {
        // Không cần xử lý thêm
    }
}