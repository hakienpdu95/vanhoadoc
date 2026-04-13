<?php
namespace App\Helpers;

class SecurityHelper {
    private static string $site_key = '1x00000000000000000000AA'; // ← thay bằng key của bạn
    private static string $secret_key = '1x0000000000000000000000000000000AA';

    public static function init(): void {
        add_action('wp_enqueue_scripts', [self::class, 'enqueueTurnstile']);
    }

    public static function enqueueTurnstile(): void {
        if (is_page(['dang-ky', 'quen-mat-khau']) || is_singular('viet-product')) {
            wp_enqueue_script('cloudflare-turnstile', 'https://challenges.cloudflare.com/turnstile/v0/api.js', [], null, true);
        }
    }

    public static function renderWidget(): void {
        echo '<div class="cf-turnstile" data-sitekey="' . self::$site_key . '" data-action="register" data-theme="light"></div>';
    }

    public static function verify(string $token): bool {
        if (empty($token)) return false;

        $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'body' => [
                'secret'   => self::$secret_key,
                'response' => $token,
                'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
            ]
        ]);

        if (is_wp_error($response)) return false;

        $body = json_decode(wp_remote_retrieve_body($response), true);
        return !empty($body['success']);
    }
}