<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => 1,
            'title' => fake()->realText(20),
            'body' => fake()->realText(500),
            'url' => fake()->url,
            'is_favorite' => fake()->boolean,
        ];
    }
}
