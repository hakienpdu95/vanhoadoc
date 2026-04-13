<?php

namespace App\Taxonomies;

class TheLoaiTaxonomy extends BaseTaxonomy
{
    protected function getTaxonomyKey(): string
    {
        return 'the-loai';
    }

    protected function getSingular(): string
    {
        return 'Thể loại';
    }

    protected function getPlural(): string
    {
        return 'Thể loại sách';
    }

    protected function getPostTypes(): array
    {
        return ['book-review'];       
    }

    protected function getArgs(): array
    {
        $args = parent::getArgs();

        $args['hierarchical']   = true;           
        $args['show_in_rest']   = true;        
        $args['query_var']      = true;

        $args['rewrite'] = [
            'slug'         => 'the-loai', 
            'with_front'   => false,
            'hierarchical' => true,              
        ];

        return $args;
    }
}