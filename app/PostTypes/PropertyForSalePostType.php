<?php
namespace App\PostTypes;

class PropertyForSalePostType extends BasePostType {
    protected function getPostTypeKey(): string {
        return 'property-for-sale';
    }

    protected function getSingular(): string {
        return 'Nhà đất bán';
    }

    protected function getPlural(): string {
        return 'Nhà đất bán';
    }

    protected function getArgs(): array {
        return array_merge(parent::getArgs(), [
            'rewrite'         => ['slug' => 'nha-dat-ban'],
            'menu_icon'       => 'dashicons-building',
            'menu_position'   => 10,
            // 'capability_type' => 'property_for_sale',
            // 'map_meta_cap'    => true,
            'supports'        => ['title', 'editor'],
        ]);
    }
}