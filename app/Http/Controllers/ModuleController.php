<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\QueryFilters\SortFilter;
use Illuminate\Pipeline\Pipeline;
use App\QueryFilters\SearchFilter;
use Illuminate\Support\Facades\Log;
use App\QueryFilters\CategoryFilter;

class ModuleController extends Controller
{
    public $perPage = 10;

    public function index()
    {
        $page_title = 'All modules';
        
        return view('blog.modules-page', compact('page_title'));
    }

    public function view($slug)
    {
        $slug = filter_var ( $slug, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $module = Module::where('slug', $slug)->with('posts')->first();

        if($module == null){
            abort(404);
        }

        $meta_data = $this->setup_meta($module);
        $og_meta_data = $this->setup_og($module);
        $schema_markup = $this->setup_schema_markup($module);

        $module_id = $module->id;
        $module_name = $module->title;
        $module_description  =$module->description;

        $page_title = 'Module';
        return view('blog.module-page', compact('page_title', 'module_id', 'module_name', 'module_description'));
    }

    public function setup_meta($module){

        try {

            $metadata['title'] = $module->title;
            $metadata['author'] = $module->user->name;
            $metadata['description'] = $module->description;

            return $metadata;

        } catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function setup_schema_markup($module){

        try {

            $description = $module->description;
            $title = $module->title;

            $json_ld = [
                "post_url" => env('APP_URL') . '/module/' . $module->slug . '/',
                "post_title"=> $title,
                "post_description"=> $description,
                "post_thumbnail"=> $module->thumbnail,  
                "author_type"=> "Person",
                "author_name"=> $module->user->name,
                "author_url"=> "https://www.instagram.com/mehdi.dsgn",
                "publisher_type" => "Organization",
                "publisher_name"=> "MSBlog",
                "publisher_logo"=> env('APP_URL') . '/assets/logo.svg',
                "date_published"=> $module->created_at->format('Y-m-d h:m:s'),
                "date_modified"=> $module->updated_at->format('Y-m-d h:m:s')
            ];

            return $json_ld;

        } catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function setup_og($module){

        try{
            
            $og_metadata = [
                'og:url' => env('APP_URL') . '/module/' . $module->slug . '/',
                'og:image' => $module->thumbnail,
                'og:image:alt' => $module->title,
                'og:type' => 'article',
                'article:published_time' => $module->created_at,
                'article:modified_time' => $module->updated_at,
                'article:author' => $module->user->name,
                'article:section' => $module->post()->first()->category->title,
            ];

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
