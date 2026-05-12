<?php

namespace Database\Factories;

use App\Models\WebGallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebGalleryFactory extends Factory
{
    protected $model = WebGallery::class;

    public function definition(): array
    {
        return [
            'image' => fake()->word(),
            'category_id' => fake()->randomNumber(),
            'type' => fake()->word(),
            'link' => fake()->url(),
        ];
    }
}