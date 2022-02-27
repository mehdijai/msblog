<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => "Design basics",
                'slug' => "design-basics",
                'description' => "Learn the basics you need to start",
            ],
            [
                'title' => "Brand identity design",
                'slug' => "brand-identity-design",
                'description' => "Learn about brand identity design",
            ],
            [
                'title' => "Web design",
                'slug' => "web-design",
                'description' => "Learn about web design; UI and UX",
            ],
            [
                'title' => "Real projects",
                'slug' => "real-projects",
                'description' => "Let's work on a real project. This way we can learn more efficiantly by practicing.",
            ],
            [
                'title' => "Web dev",
                'slug' => "web-dev",
                'description' => "Snippets and tips about web development",
            ],
            [
                'title' => "Design assets",
                'slug' => "design-assets",
                'description' => "templates and assets to help you improve your productivity",
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
