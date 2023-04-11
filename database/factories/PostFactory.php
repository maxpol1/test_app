<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'content' => fake()->text(),
            'image' => 'photo1.png',
            'date' => '21/10/23',
            'views' => fake()->numberBetween(0, 5000),
            'category_id' => 1,
            'user_id' => 1,
            'status' => 1,
            'is_featured' => 0,
        ];
    }
}
