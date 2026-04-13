<?php
namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SMTPMailer {
    public static function init(): void {
        if (!defined('SMTP_HOST') || empty(SMTP_HOST)) {
            return;
        }

        // Force mạnh nhất có thể
        add_action('phpmailer_init', [self::class, 'configure'], 999, 1);
        
        // Backup filters (đề phòng)
        add_filter('wp_mail_from', [self::class, 'forceFromEmail']);
        add_filter('wp_mail_from_name', [self::class, 'forceFromName']);

        add_action('wp_mail_failed', [self::class, 'logError'], 10, 1);
    }

    public static function configure(PHPMailer $phpmailer): void {
        $phpmailer->isSMTP();
        $phpmailer->Host       = SMTP_HOST;
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = SMTP_PORT;
        $phpmailer->Username   = SMTP_USERNAME;
        $phpmailer->Password   = SMTP_PASSWORD;
        $phpmailer->SMTPSecure = 'tls';

        // === FORCE FROM MẠNH NHẤT ===
        $phpmailer->setFrom(SMTP_FROM, SMTP_FROM_NAME);
        $phpmailer->Sender     = SMTP_FROM;           // Return-Path
        $phpmailer->From       = SMTP_FROM;
        $phpmailer->FromName   = SMTP_FROM_NAME;

        $phpmailer->isHTML(true);                     // Quan trọng cho template Blade

        if (defined('WP_DEBUG') && WP_DEBUG) {
            $phpmailer->SMTPDebug = 2;
            $phpmailer->Debugoutput = 'error_log';
        }
    }

    public static function forceFromEmail($email) {
        return defined('SMTP_FROM') ? SMTP_FROM : $email;
    }

    public static function forceFromName($name) {
        return defined('SMTP_FROM_NAME') ? SMTP_FROM_NAME : $name;
    }

    public static function logError(\WP_Error $error): void {
        error_log('[SMTP ERROR] ' . $error->get_error_message());
    }
}