<?php

namespace App\EloquentFilters\Category;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterWithCategoryFilter extends Filter
{
    /**
     * Apply the condition to the query.
     *
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Builder $builder, $query): Builder
    {
        $category = request('category');
        if( isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('categories' , function ($query) use ($category) {
                $query->whereId($category);
            });
        }    }
}
