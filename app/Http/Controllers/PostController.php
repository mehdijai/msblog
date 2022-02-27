<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\QueryFilters\SortFilter;
use Illuminate\Pipeline\Pipeline;
use App\QueryFilters\SearchFilter;
use Illuminate\Support\Facades\Log;
use App\QueryFilters\CategoryFilter;

class PostController extends Controller
{
    public $perPage = 10;

    public function index()
    {
        $page_title = 'All Posts';
        
        return view('blog.posts-page', compact('page_title'));
    }

    public function view($slug)
    {
        $slug = filter_var ( $slug, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $post = Post::where('archived', false)->where('slug', $slug)->with('user', 'category')->first();

        if($post == null){
            abort(404);
        }

        $meta_data = $this->setup_meta($post);
        $og_meta_data = $this->setup_og($post);
        $schema_markup = $this->setup_schema_markup($post);
        
        $category = $post->category;
        
        $posts = Post::where('archived', false)->where('slug', '!=', $slug);
        
        if($category->posts()->where('archived', false)->get()->count() >= 5){
            $posts = $posts->where('category_id', $category->id);
        }

        $related_posts = $posts->limit(4)->with('user', 'category')->get();

        $related_posts->each(function ($post) {
            $post->append('brief');
        });

        return view('blog.post-page', compact('post', 'meta_data', 'schema_markup', 'og_meta_data', 'related_posts'));

    }

    public function category($slug)
    {
        $slug = filter_var ( $slug, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $category = Category::where('slug', $slug)->first();

        if($category == null){
            abort(404);
        }

        $category_id = $category->id;
        $category_name = $category->title;
        $category_description  =$category->description;

        $page_title = 'Category';
        return view('blog.posts-page', compact('page_title', 'category_id', 'category_name', 'category_description'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('blog.about', compact('categories'));
    }

    public function contact()
    {
        return view('blog.contact');
    }

    public function setup_meta($post){

        try {

            $post->append('brief');

            $metadata = [];

            if($post->seo_data == null){
                $metadata['title'] = $post->title;
                $metadata['author'] = $post->user->name;
                $metadata['description'] = $post->brief;
            }else{
                $data = json_decode($post->seo_data);
                $metadata['title'] = $data['title'];
                $metadata['description'] = $data['description'];
                $metadata['keywords'] = $data['tags'];
            }

            return $metadata;

        } catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function setup_schema_markup($post){

        try {

            $post->append('brief');

            $description = $post->brief;
            $title = $post->title;

            if($post->seo_data != null){
                $data = json_decode($post->seo_data);
                $title = $data['title'];
                $description = $data['description'];
            }

            $json_ld = [
                "post_url" => env('APP_URL') . '/post/' . $post->slug . '/',
                "post_title"=> $title,
                "post_description"=> $description,
                "post_thumbnail"=> $post->thumbnail,  
                "author_type"=> "Person",
                "author_name"=> $post->user->name,
                "author_url"=> "https://www.instagram.com/mehdi.dsgn",
                "publisher_type" => "Organization",
                "publisher_name"=> "MSBlog",
                "publisher_logo"=> env('APP_URL') . '/assets/logo.svg',
                "date_published"=> $post->created_at->format('Y-m-d h:m:s'),
                "date_modified"=> $post->updated_at->format('Y-m-d h:m:s')
            ];

            return $json_ld;

        } catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function setup_og($post){

        try{
            
            $og_metadata = [
                'og:url' => env('APP_URL') . '/post/' . $post->slug . '/',
                'og:image' => $post->thumbnail,
                'og:image:alt' => $post->title,
                'og:type' => 'article',
                'article:published_time' => $post->created_at,
                'article:modified_time' => $post->updated_at,
                'article:author' => $post->user->name,
                'article:section' => $post->category->title,
            ];

            // ! SEO

            if($post->seo_data != null){
                $og_metadata['article:tag'] = $data['tags'];
            }

            $metaHtml = "";

            foreach ($og_metadata as $key => $value) {
                $metaHtml .= " <meta property='$key' content='$value' /> \n ";
            }

            return $metaHtml;

            
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
