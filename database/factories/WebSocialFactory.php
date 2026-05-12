<?php

namespace Database\Factories;

use App\Models\WebSocial;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebSocialFactory extends Factory
{
    protected $model = WebSocial::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'icon' => fake()->word(),
            'link' => fake()->url(),
            'status' => fake()->word(),
        ];
    }
}