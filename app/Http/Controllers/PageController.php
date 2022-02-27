<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{

    public function home()
    {
        $latest_posts = Post::where('archived', false)->with('category', 'module')->limit(6)->orderBy('created_at', 'asc')->get();

        $latest_posts->each(function ($post) {
            $post->append('brief');
        });

        $latest_modules = Module::withCount('posts')
                ->having('posts_count', '>', 0)
                ->limit(3)
                ->orderBy('created_at', 'asc')
                ->get();
    
        return view('blog.home-page', compact('latest_modules', 'latest_posts'));
    }
    
}
