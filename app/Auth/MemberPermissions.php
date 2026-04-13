<?php
namespace App\Auth;

use App\Helpers\CacheHelper;

class MemberPermissions {
    private static array $allowed_cpts = ['viet-product'];
    private static bool $initialized = false;

    public static function init(): void {
        if (self::$initialized) return;
        self::$initialized = true;

        add_filter('wp_insert_post_data', [self::class, 'forcePendingStatus'], 10, 2);
        add_action('pre_get_posts', [self::class, 'restrictToOwnPosts'], 5);
        add_action('admin_enqueue_scripts', [self::class, 'hidePublishButton']);
        add_action('admin_menu', [self::class, 'removeTaxonomyMetaboxForMember']);

        // Cho phép chỉnh sửa bài đã publish
        add_filter('user_has_cap', [self::class, 'allowEditPublishedPost'], 10, 3);

        add_action('after_setup_theme', [self::class, 'grantRoleMemberCapabilities'], 20);
    }

    public static function grantRoleMemberCapabilities(): void {
        if (get_option('member_caps_granted_v4')) return;

        $role = get_role('member');
        if ($role) {
            $caps = ['read', 'upload_files', 'read_viet_product', 'read_private_viet_products',
                     'edit_viet_product', 'edit_viet_products', 'edit_others_viet_products',
                     'create_viet_products', 'edit_published_viet_products',
                     'delete_viet_product', 'delete_viet_products'];

            foreach ($caps as $cap) $role->add_cap($cap);
        }
        update_option('member_caps_granted_v4', true, true);
    }

    /**
     * MEMBER CHỈ THẤY BÀI CỦA CHÍNH MÌNH
     */
    public static function restrictToOwnPosts(\WP_Query $query): void {
        if (!is_admin() || !$query->is_main_query() || $query->get('post_type') !== 'viet-product') return;

        $user = wp_get_current_user();
        if (in_array('member', (array)$user->roles) && !current_user_can('administrator')) {
            $query->set('author', $user->ID);
        }
    }

    /**
     * CHO PHÉP MEMBER CHỈNH SỬA BÀI ĐÃ PUBLISH (KHÔNG ÉP VỀ PENDING)
     */
    public static function allowEditPublishedPost($allcaps, $caps, $args): array {
        if (empty($args[0]) || $args[0] !== 'edit_post') return $allcaps;

        $post_id = (int)($args[2] ?? 0);
        if (!$post_id) return $allcaps;

        $post = get_post($post_id);
        if (!$post || $post->post_type !== 'viet-product') return $allcaps;

        $user = wp_get_current_user();
        if (!in_array('member', (array)$user->roles)) return $allcaps;

        // Nếu bài đã publish và thuộc về user này → cho phép edit
        if ($post->post_status === 'publish' && (int)$post->post_author === $user->ID) {
            $allcaps['edit_viet_product'] = true;
            $allcaps['edit_published_viet_products'] = true;
            $allcaps['edit_post'] = true;
        }
        return $allcaps;
    }

    /**
     * ÉP PENDING CHỈ KHI TẠO MỚI HOẶC BÀI CHƯA PUBLISH
     */
    public static function forcePendingStatus(array $data, array $postarr): array {
        if (!in_array($data['post_type'], self::$allowed_cpts)) return $data;

        $user = wp_get_current_user();
        if (!in_array('member', (array)$user->roles)) return $data;

        // Chỉ ép pending khi tạo mới hoặc bài đang là draft/pending
        if ($data['post_status'] !== 'publish' && empty($postarr['ID'])) {
            $data['post_status'] = 'pending';
        }
        return $data;
    }

    public static function publishProduct(int $post_id): bool {
        $post = get_post($post_id);
        if (!$post || $post->post_type !== 'viet-product') return false;

        $result = wp_update_post(['ID' => $post_id, 'post_status' => 'publish']);
        if (!is_wp_error($result)) {
            CacheHelper::bumpDataVersion('viet-product');
            return true;
        }
        return false;
    }

    public static function hidePublishButton(): void {
        if (current_user_can('administrator')) return;
        if (!in_array(get_post_type(), self::$allowed_cpts)) return;

        wp_add_inline_style('wp-admin', '
            .editor-post-publish-button,
            .editor-post-publish-panel__toggle { display: none !important; }
        ');
    }

    public static function removeTaxonomyMetaboxForMember(): void {
        if (current_user_can('administrator')) return;
        if (!in_array('member', (array)wp_get_current_user()->roles)) return;

        remove_meta_box('categorydiv', 'viet-product', 'side');
        remove_meta_box('tagsdiv-post_tag', 'viet-product', 'side');
    }
}