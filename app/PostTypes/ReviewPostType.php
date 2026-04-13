<?php

namespace App\PostTypes;

class ReviewPostType extends BasePostType
{
    protected function getPostTypeKey(): string { return 'review'; }
    protected function getSingular(): string    { return 'Book Reviews'; }
    protected function getPlural(): string      { return 'Book Reviews'; }

    protected function getArgs(): array
    {
        return array_merge(parent::getArgs(), [
            'menu_icon'     => 'dashicons-megaphone',
            'menu_position' => 6,
            'supports'      => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'],
        ]);
    }
}