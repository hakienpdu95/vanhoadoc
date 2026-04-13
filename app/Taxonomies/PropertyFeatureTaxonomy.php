<?php namespace App\Taxonomies;

class PropertyFeatureTaxonomy extends BaseTaxonomy
{
	protected function getTaxonomyKey(): string
    {
        return 'property-feature';
    }

    protected function getSingular(): string
    {
        return 'Ưu điểm nổi bật';
    }

    protected function getPlural(): string
    {
        return 'Ưu điểm nổi bật';
    }

    protected function getPostTypes(): array
    {
        return ['property-for-sale', 'property-for-rent'];
    }

    protected function getArgs(): array
    {
        $args = parent::getArgs();
        $args['hierarchical'] = true;          
        $args['rewrite'] = ['slug' => 'uu-diem-noi-bat'];
        return $args;
    }
}