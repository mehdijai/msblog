<?php

namespace App\QueryFilters;

use Closure;

class CategoryFilter
{
    public function handle($request, Closure $next)
    {

        if(!request()->has('category')){
            return $next($request);
        }

        $builder = $next($request);

        return $this->applyFilter($builder);
    }

    protected function applyFilter($builder)
    {
        $category = request('category');

        if($category == ''){
            return $builder;
        }

        return $builder->join('categories as c1', 'c1.id', '=', 'posts.category_id')
                ->where('c1.slug', $category)
                ->select('posts.*');
    }
}