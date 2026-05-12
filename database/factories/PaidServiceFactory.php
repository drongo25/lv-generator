<?php

namespace Database\Factories;

use App\Models\PaidService;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaidServiceFactory extends Factory
{
    protected $model = PaidService::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'price_type' => fake()->word(),
            'price' => fake()->randomFloat(2, 0, 9999),
            'short_desc' => fake()->paragraph(),
            'long_desc' => fake()->paragraph(),
            'status' => fake()->randomNumber(),
        ];
    }
}