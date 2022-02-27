<?php

namespace App\QueryFilters;

use Closure;

class SearchFilter
{
    public function handle($request, Closure $next)
    {

        if(!request()->has('search')){
            return $next($request);
        }

        $builder = $next($request);

        return $this->applyFilter($builder);
    }

    protected function applyFilter($builder)
    {
        $search = request('search');

        return $builder->join('categories as c2', 'c2.id', '=', 'posts.category_id')
                ->where(function($query) use($search) {
                    $query->where('posts.title', 'LIKE', "%{$search}%")
                        ->orWhere('posts.content', 'LIKE', "%{$search}%")
                        ->orWhere('c2.title', 'LIKE', "%{$search}%");
                })->select('posts.*');
                
    }
}