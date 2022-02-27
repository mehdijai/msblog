<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3, true);
        $paragraphs = $this->faker->paragraphs(20);
        
        $post = "";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        $post .= "<a href='#'>A link</a>";

        return [
            'title' => $title,
            'thumbnail' => $this->faker->imageUrl(500, 333),
            'archived' => false,
            'seo_data' => null,
            'slug'=> Str::slug($title, '-'),
            'content' => $post,
            'category_id' => $this->faker->randomElement([1,2,3,4,5]),
            'user_id' => 1,
            'type_id'=> 1,
        ];
    }
}
