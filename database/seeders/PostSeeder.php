<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $posts = [
            [
                'title' => "Graphic elements",
                'thumbnail' => "/assets/posts/graphic-elements.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Graphic elements", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 1,
                'user_id' => 1,
                'type_id'=> 1,
            ],
            [
                'title' => "Design principles",
                'thumbnail' => "/assets/posts/graphic-principles.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Design principles", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 1,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 1,
            ],
            [
                'title' => "Typography basics",
                'thumbnail' => "/assets/posts/typo-basics.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Typography basics", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 1,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 1,
            ],
            [
                'title' => "Typography rules",
                'thumbnail' => "/assets/posts/typo.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Typography rules", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 1,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 1,
            ],
            [
                'title' => "Colors in depth",
                'thumbnail' => "/assets/posts/colors-in-depth.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Colors in depth", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 1,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 1,
            ],
            [
                'title' => "Handle colors in graphic design",
                'thumbnail' => "/assets/posts/colors.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Handle colors in graphic design", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 1,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 1,
            ],
            [
                'title' => "Before statrting building a web application",
                'thumbnail' => "/assets/posts/blog-pre-design.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Before statrting building a web application", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 3,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 2,
            ],
            [
                'title' => "Design of blog web application",
                'thumbnail' => "/assets/posts/blog-design.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Design of blog web application", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 3,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 2,
            ],
            [
                'title' => "Developping the user side of the blog",
                'thumbnail' => "/assets/posts/dev-user-side.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Developping the user side of the blog", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 3,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 2,
            ],
            [
                'title' => "Developping the admins side of the blog",
                'thumbnail' => "/assets/posts/dev-admin-side.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Developping the admins side of the blog", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 3,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 2,
            ],
            [
                'title' => "Roadmap of brand identity design",
                'thumbnail' => "/assets/posts/roadmap.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Roadmap of brand identity design", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 2,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 3,
            ],
            [
                'title' => "Developping the logo system",
                'thumbnail' => "/assets/posts/logo-system.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Developping the logo system", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 2,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 3,
            ],
            [
                'title' => "Developping the typography system",
                'thumbnail' => "/assets/posts/typo-system.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Developping the typography system", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 2,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 3,
            ],
            [
                'title' => "Developping the color system",
                'thumbnail' => "/assets/posts/color-system.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Developping the color system", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 2,
                'user_id' => 1,
                'type_id'=> 1,
                'module_id'=> 3,
            ],
            [
                'title' => "Free logo presentations template",
                'thumbnail' => "/assets/posts/free-template.png",
                'archived' => false,
                'seo_data' => null,
                'slug'=> Str::slug("Free logo presentations template", '-'),
                'content' => $this->getContent($faker),
                'category_id' => 6,
                'user_id' => 1,
                'type_id'=> 1,
            ],
        ];
 
        foreach ($posts as $post) {
            Post::create($post);
        }
    }

    public function getContent($faker)
    {
        $paragraphs = $faker->paragraphs(20);
        
        $content = "";
        foreach ($paragraphs as $para) {
            $content .= "<p>{$para}</p>";
        }

        $content .= "<a href='#'>A link</a>";

        return $content;
    }
}
