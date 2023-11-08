<?php

namespace Database\Factories;

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
            'category_id' => random_int(1,5),
            'user_id' => 2,
            'title' => fake()->words(6,true),
            'slug' => fake()->slug(10),
            'content' => fake()->sentences(10,true),
        ];
    }
}
