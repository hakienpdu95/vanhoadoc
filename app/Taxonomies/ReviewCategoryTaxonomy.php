<?php namespace App\Taxonomies;

class ReviewCategoryTaxonomy extends BaseTaxonomy
{
    protected function getTaxonomyKey(): string
    {
        return 'review-category';
    }

    protected function getSingular(): string
    {
        return 'Danh mục review';
    }

    protected function getPlural(): string
    {
        return 'Danh mục review';
    }

    protected function getPostTypes(): array
    {
        return ['viet-product'];
    }

    protected function getArgs(): array
    {
        $args = parent::getArgs();
        $args['hierarchical'] = true;          
        // $args['rewrite'] = ['slug' => 'loai-san-pham'];
        return $args;
    }
}