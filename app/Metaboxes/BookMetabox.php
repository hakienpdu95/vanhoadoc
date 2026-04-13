<?php
namespace App\Metaboxes;

class BookMetabox extends BaseMetabox
{
    protected string $title = 'Thông tin Affiliate';
    protected array $post_types = ['book-review'];

    protected function getFields(): array
    {
        return [
            [
                'name' => 'Link Affiliate Shopee',
                'id'   => 'aff_shopee',
                'type' => 'text',
            ],
            [
                'name' => 'Link Affiliate TikTok Shop',
                'id'   => 'aff_tiktok',
                'type' => 'text',
            ],
            [
                'name' => 'Link Affiliate Tiki',
                'id'   => 'aff_tiki',
                'type' => 'text',
            ],
            [
                'name' => 'Link Affiliate Lazada',
                'id'   => 'aff_lazada',
                'type' => 'text',
            ],
        ];
    }
}