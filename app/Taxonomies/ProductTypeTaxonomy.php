<?php namespace App\Taxonomies;

class ProductTypeTaxonomy extends BaseTaxonomy
{
    protected function getTaxonomyKey(): string
    {
        return 'product-type';
    }

    protected function getSingular(): string
    {
        return 'Loại sản phẩm';
    }

    protected function getPlural(): string
    {
        return 'Loại sản phẩm';
    }

    protected function getPostTypes(): array
    {
        return ['viet-product'];
    }

    protected function getArgs(): array
    {
        $args = parent::getArgs();
        $args['hierarchical'] = true;          
        $args['rewrite'] = ['slug' => 'loai-san-pham'];
        return $args;
    }
}