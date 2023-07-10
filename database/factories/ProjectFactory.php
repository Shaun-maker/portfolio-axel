<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => function() { 
                return Category::inRandomOrder()->first()->id; 
            },
            'title' => fake()->sentence(),
            'url_image' => 'images/projects/resize-web-single-image.png',
            'description' => fake()->paragraphs(),
        ];
    }
}
