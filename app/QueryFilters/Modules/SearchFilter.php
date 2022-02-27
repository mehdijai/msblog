<?php

namespace App\QueryFilters\Modules;

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

        return $builder->join('posts', 'posts.module_id', '=', 'modules.id')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->where(function($query) use($search) {
                    $query->where('modules.title', 'LIKE', "%{$search}%")
                        ->orWhere('modules.description', 'LIKE', "%{$search}%")
                        ->orWhere('posts.title', 'LIKE', "%{$search}%")
                        ->orWhere('posts.content', 'LIKE', "%{$search}%")
                        ->orWhere('categories.title', 'LIKE', "%{$search}%")
                        ->orWhere('categories.description', 'LIKE', "%{$search}%");
                })->select('modules.*');  
    }
}