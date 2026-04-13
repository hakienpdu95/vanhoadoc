<?php 
namespace App\Metaboxes;

class ProductLocationMetabox extends BaseMetabox {
    protected string $title = 'Vị trí – Tỉnh & Phường/Xã';
    protected array $post_types = ['post', 'viet-travel'];

    protected function getFields(): array {
        global $wpdb;
        $provinces = $wpdb->get_results("SELECT province_code, name FROM {$wpdb->prefix}provinces ORDER BY name", ARRAY_A);

        $options = ['' => 'Chọn tỉnh/thành'];
        foreach ($provinces as $p) {
            $options[$p['province_code']] = $p['name'];
        }

        return [
            // Tỉnh
            [
                'name'    => 'Tỉnh/Thành phố',
                'id'      => 'province_code',
                'type'    => 'select',
                'options' => $options,
                'desc'    => 'Chọn tỉnh để load phường/xã',
            ],
            // Hidden field để truyền giá trị cũ sang JS
            [
                'type' => 'hidden',
                'id'   => 'ward_code_saved',
                'std'  => get_post_meta(get_the_ID(), 'ward_code', true),
            ],
            // Phường/Xã
            [
                'name'       => 'Phường/Xã',
                'id'         => 'ward_code',
                'type'       => 'select',
                'options'    => ['' => 'Chọn phường/xã'],
                'desc'       => 'Tự động load theo tỉnh',
                'save_field' => false,
            ],
        ];
    }
}