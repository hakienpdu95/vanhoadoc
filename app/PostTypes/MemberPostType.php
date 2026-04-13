<?php
namespace App\PostTypes;

class MemberPostType extends BasePostType {
    protected function getPostTypeKey(): string {
        return 'member';
    }

    protected function getSingular(): string {
        return 'Thành viên';
    }

    protected function getPlural(): string {
        return 'Thành viên';
    }

    protected function getArgs(): array {
        return array_merge(parent::getArgs(), [
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => 'users.php',     
            'menu_icon'           => 'dashicons-groups',
            'menu_position'       => 15,
            'supports'            => ['title', 'thumbnail', 'author'],
            'has_archive'         => false,
            'rewrite'             => false,
            'show_in_rest'        => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
        ]);
    }
}