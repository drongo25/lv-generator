<?php

namespace Database\Factories;

use App\Models\WebGalleryCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebGalleryCategoryFactory extends Factory
{
    protected $model = WebGalleryCategory::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}