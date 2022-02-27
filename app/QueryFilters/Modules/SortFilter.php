<?php

namespace App\QueryFilters\Modules;

use Closure;

class SortFilter
{
    public function handle($request, Closure $next)
    {

        if(!request()->has('sort')){
            return $next($request);
        }

        $builder = $next($request);

        return $this->applySort($builder);
    }

    protected function applySort($builder)
    {
        $sort = request('sort');

        switch($sort){
            case 'new': return $builder->orderBy('created_at', 'asc');
            case 'old': return $builder->orderBy('created_at', 'desc');
        }

        return $builder;
    }
}