<?php
namespace App\Helpers;

use App\Helpers\CacheHelper;

class LocationHelper {
    private static $cache_group = 'location_vn';

    public static function getProvinceName(string $code): string {
        $cache_key = 'prov_name_' . $code;
        $cached = wp_cache_get($cache_key, self::$cache_group);
        if ($cached !== false) return $cached;

        global $wpdb;
        $name = $wpdb->get_var($wpdb->prepare(
            "SELECT name FROM {$wpdb->prefix}provinces WHERE province_code = %s LIMIT 1",
            $code
        ));

        wp_cache_set($cache_key, $name ?: '', self::$cache_group, 0); // cache vĩnh viễn
        return $name ?: '';
    }

    public static function getWardName(string $ward_code, string $province_code): string {
        $cache_key = 'ward_name_' . $ward_code;
        $cached = wp_cache_get($cache_key, self::$cache_group);
        if ($cached !== false) return $cached;

        global $wpdb;
        $name = $wpdb->get_var($wpdb->prepare(
            "SELECT name FROM {$wpdb->prefix}wards 
             WHERE ward_code = %s AND province_code = %s LIMIT 1",
            $ward_code, $province_code
        ));

        wp_cache_set($cache_key, $name ?: '', self::$cache_group, 0);
        return $name ?: '';
    }

    // AJAX: Lấy danh sách phường/xã theo tỉnh (dùng cho select động)
    public static function ajaxGetWards(): void {
        check_ajax_referer('location_nonce', 'nonce');
        $province_code = sanitize_text_field($_POST['province_code'] ?? '');

        global $wpdb;
        $wards = $wpdb->get_results($wpdb->prepare(
            "SELECT ward_code, name FROM {$wpdb->prefix}wards 
             WHERE province_code = %s ORDER BY name",
            $province_code
        ), ARRAY_A);

        wp_send_json_success($wards);
    }
}

// Hook AJAX
add_action('wp_ajax_get_wards', [LocationHelper::class, 'ajaxGetWards']);
add_action('wp_ajax_nopriv_get_wards', [LocationHelper::class, 'ajaxGetWards']);