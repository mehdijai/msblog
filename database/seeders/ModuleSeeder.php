<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'title' => "Graphic design basics",
                'slug' => "design-basics",
                'thumbnail' => "/assets/modules/design-basics.png",
                'description' => "All what you need to start as a graphic designer.",
            ],
            [
                'title' => "Create a blog from screatch",
                'slug' => "create-a-blog-from-scratch",
                'thumbnail' => "/assets/modules/create-a-blog-from-scratch.png",
                'description' => "a step by step process of creating a blog from the features list passing by UX design and UI on Figma to the develoment with TALL stack",
            ],
            [
                'title' => "Brand identity design module",
                'slug' => "brand-identity-design-module",
                'thumbnail' => "/assets/modules/brand-identity-design-module.png",
                'description' => "Learn the process of building a brand identity.",
            ],
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
