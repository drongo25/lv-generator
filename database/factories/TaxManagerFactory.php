<?php

namespace Database\Factories;

use App\Models\TaxManager;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxManagerFactory extends Factory
{
    protected $model = TaxManager::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'code' => fake()->word(),
            'type' => fake()->word(),
            'rate' => fake()->randomFloat(2, 0, 9999),
            'status' => fake()->randomNumber(),
        ];
    }
}