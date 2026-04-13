<?php
namespace App\Helpers;

class EmailHelper {
    public static function send(string $to, string $subject, string $view, array $data = []): bool {
        $html = view($view, $data)->render();

        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . SMTP_FROM_NAME . ' <' . SMTP_FROM . '>'
        ];

        $sent = wp_mail($to, $subject, $html, $headers);

        if (!$sent && defined('WP_DEBUG') && WP_DEBUG) {
            error_log('[EMAIL FAILED] To: ' . $to . ' | Subject: ' . $subject);
        }

        return $sent;
    }
}