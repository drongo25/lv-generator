<?php

namespace Database\Factories;

use App\Models\Gateway;
use Illuminate\Database\Eloquent\Factories\Factory;

class GatewayFactory extends Factory
{
    protected $model = Gateway::class;

    public function definition(): array
    {
        return [
            'main_name' => fake()->name(),
            'name' => fake()->name(),
            'minamo' => fake()->randomFloat(2, 0, 9999),
            'maxamo' => fake()->randomFloat(2, 0, 9999),
            'fixed_charge' => fake()->randomFloat(2, 0, 9999),
            'percent_charge' => fake()->randomFloat(2, 0, 9999),
            'rate' => fake()->randomFloat(2, 0, 9999),
            'val1' => fake()->word(),
            'val2' => fake()->word(),
            'val3' => fake()->word(),
            'val4' => fake()->word(),
            'val5' => fake()->word(),
            'val6' => fake()->word(),
            'val7' => fake()->word(),
            'status' => fake()->randomNumber(),
        ];
    }
}