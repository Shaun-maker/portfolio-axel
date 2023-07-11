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
        $urls = [
            'images/projects/booki-fakedata.png',
            'images/projects/elagage41-fakedata.png',
            'images/projects/resize-web-fakedata.png'
        ];

        $project_link = rand(0, 1) ? fake()->url() : null;
        $source_link = rand(0, 1) ? fake()->url() : null;

        return [
            'category_id' => function() {
                return Category::inRandomOrder()->first()->id; 
            },
            'title' => fake()->sentence(),
            'url_image' => $urls[array_rand($urls)],
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(3)) . '</p>',
            'project_link' => $project_link,
            'source_link' => $source_link, 
        ];
    }
}
