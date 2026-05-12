<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'cat_id' => fake()->randomNumber(),
            'title' => fake()->sentence(),
            'image' => fake()->word(),
            'thumb' => fake()->word(),
            'details' => fake()->paragraph(),
            'status' => fake()->randomNumber(),
            'hit' => fake()->randomNumber(),
        ];
    }
}