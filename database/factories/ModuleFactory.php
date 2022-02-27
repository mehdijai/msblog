<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "Design basics",
            'slug' => "design-basics",
            'description' => "Learn the basics of graphic design to become a profesional one!",
            'thumbnail' => "/assets/bg.jpg",
        ];
    }
}
