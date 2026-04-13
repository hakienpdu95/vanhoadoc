<?php

namespace App\PostTypes;

class VietHeritagePostType extends BasePostType
{
    protected function getPostTypeKey(): string { return 'viet-heritage'; }
    protected function getSingular(): string    { return 'Di sản'; }
    protected function getPlural(): string      { return 'Di sản'; }

    protected function getArgs(): array
    {
        return array_merge(parent::getArgs(), [
            'menu_icon'     => 'dashicons-megaphone',
            'menu_position' => 5,
            'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        ]);
    }

    protected function useDefaultCategory(): bool
    {
        return true; 
    }
}