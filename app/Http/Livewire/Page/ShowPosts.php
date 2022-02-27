<?php

namespace App\Http\Livewire\Page;

use App\Models\Post;
use App\Models\Module;
use Livewire\Component;
use App\QueryFilters\SortFilter;
use Illuminate\Pipeline\Pipeline;
use App\QueryFilters\SearchFilter;
use App\QueryFilters\CategoryFilter;
use App\Http\Controllers\PostController;

class ShowPosts extends Component
{

    public $perPage = 10;
    public $page_type = "posts";    // ? ['posts', 'category', __'author'__, __'module'__] __x__ is not set yet!
    public $category_id = 0;
    public $module_id = 0;

    public function all_posts()
    {
        if(request()->has('perPage')){
            $this->perPage = intval(request('perPage'));
        }

        $posts = app(Pipeline::class)
            ->send(Post::query()->where('archived', false)->orderBy('created_at', 'asc'))
            ->through([
                \App\QueryFilters\CategoryFilter::class,
                \App\QueryFilters\SearchFilter::class,
                \App\QueryFilters\SortFilter::class,
            ])
            ->thenReturn()
            ->with('category')
            ->paginate($this->perPage);

        $posts->each(function ($post) {
            $post->append('brief');
        });

        return $posts;
    }

    public function all_modules()
    {
        if(request()->has('perPage')){
            $this->perPage = intval(request('perPage'));
        }

        $modules = app(Pipeline::class)
            ->send(Module::query()->orderBy('created_at', 'asc'))
            ->through([
                \App\QueryFilters\Modules\SearchFilter::class,
                \App\QueryFilters\Modules\SortFilter::class,
            ])
            ->thenReturn()
            ->paginate($this->perPage);

        return $modules;
    }

    public function by_category($category_id)
    {
        if($category_id == 0){
            return [];
        }

        if(request()->has('perPage')){
            $this->perPage = intval(request('perPage'));
        }

        $posts = app(Pipeline::class)
            ->send(Post::query()->where('archived', false)->where('category_id', $category_id)->orderBy('created_at', 'asc'))
            ->through([
                \App\QueryFilters\SearchFilter::class,
                \App\QueryFilters\SortFilter::class,
            ])
            ->thenReturn()
            ->with('category')
            ->paginate($this->perPage);

        $posts->each(function ($post) {
            $post->append('brief');
        });

        return $posts; 
    }

    public function by_module($module_id)
    {
        if($module_id == 0){
            return [];
        }

        if(request()->has('perPage')){
            $this->perPage = intval(request('perPage'));
        }

        $posts = app(Pipeline::class)
            ->send(Post::query()->where('archived', false)->where('module_id', $module_id)->orderBy('created_at', 'asc'))
            ->through([
                \App\QueryFilters\SearchFilter::class,
                \App\QueryFilters\SortFilter::class,
            ])
            ->thenReturn()
            ->with('category', 'module')
            ->paginate($this->perPage);

        $posts->each(function ($post) {
            $post->append('brief');
        });

        return $posts; 
    }

    public function render()
    {
        $posts = [];
        $modules = [];
        
        switch($this->page_type){
            case "posts": $posts = $this->all_posts();
                break;
            case "modules": $modules = $this->all_modules();
                break;
            case "category": $posts = $this->by_category($this->category_id);
                break;
            case "module": $posts = $this->by_module($this->module_id);
                break;
        }

        return view('livewire.page.show-posts')->with([
            'posts' => $posts,
            'modules' => $modules,
        ]);
    }
}