<?php
namespace App\PostTypes;

class VietProductPostType extends BasePostType {
    protected function getPostTypeKey(): string {
        return 'viet-product';
    }

    protected function getSingular(): string {
        return 'Sản phẩm';
    }

    protected function getPlural(): string {
        return 'Sản phẩm';
    }

    protected function getArgs(): array {
        return array_merge(parent::getArgs(), [
            'rewrite'         => ['slug' => 'san-pham'],
            'menu_icon'       => 'dashicons-megaphone',
            'menu_position'   => 7,
            'supports'        => ['title', 'editor', 'thumbnail', 'excerpt'],
            'capability_type' => 'viet_product',
            'map_meta_cap'    => true,
        ]);
    }
}