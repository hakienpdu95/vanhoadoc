<?php

namespace App\PostTypes;

class VietTravelPostType extends BasePostType
{
    protected function getPostTypeKey(): string { return 'viet-travel'; }
    protected function getSingular(): string    { return 'Du lịch'; }
    protected function getPlural(): string      { return 'Du lịch'; }

    protected function getArgs(): array
    {
        return array_merge(parent::getArgs(), [
            'menu_icon'     => 'dashicons-megaphone',
            'menu_position' => 10,
            'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        ]);
    }

    protected function useDefaultCategory(): bool
    {
        return false; 
    }
}