<?php
namespace App\PostTypes;

class PropertyForRentPostType extends BasePostType {
    protected function getPostTypeKey(): string {
        return 'property-for-rent';
    }

    protected function getSingular(): string {
        return 'Nhà đất cho thuê';
    }

    protected function getPlural(): string {
        return 'Nhà đất cho thuê';
    }

    protected function getArgs(): array {
        return array_merge(parent::getArgs(), [
            'rewrite'         => ['slug' => 'nha-dat-thue'],
            'menu_icon'       => 'dashicons-building',
            'menu_position'   => 13,
            'supports'        => ['title', 'editor'],
            // 'capability_type' => 'property_for_rent',
            // 'map_meta_cap'    => true,
        ]);
    }
}