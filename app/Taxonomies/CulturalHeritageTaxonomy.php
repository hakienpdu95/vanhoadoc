<?php namespace App\Taxonomies;

class CulturalHeritageTaxonomy extends BaseTaxonomy
{
    protected function getTaxonomyKey(): string
    {
        return 'cultural-heritage';
    }

    protected function getSingular(): string
    {
        return 'Di sản văn hóa';
    }

    protected function getPlural(): string
    {
        return 'Di sản văn hóa';
    }

    protected function getPostTypes(): array
    {
        return ['viet-heritage'];
    }

    protected function getArgs(): array
    {
        $args = parent::getArgs();
        $args['hierarchical'] = true;          
        $args['rewrite'] = ['slug' => 'di-san-van-hoa'];
        return $args;
    }
}