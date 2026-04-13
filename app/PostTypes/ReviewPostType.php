<?php

namespace App\PostTypes;

class ReviewPostType extends BasePostType
{
    protected function getPostTypeKey(): string { return 'book-review'; }
    protected function getSingular(): string    { return 'Book Reviews'; }
    protected function getPlural(): string      { return 'Book Reviews'; }

    protected function getArgs(): array
    {
        return array_merge(parent::getArgs(), [
            'rewrite'         => ['slug' => 'sach'],
            'menu_icon'     => 'dashicons-book-alt',
            'menu_position' => 6,
            'supports'      => ['title', 'editor', 'thumbnail', 'excerpt', 'author'],
        ]);
    }
}