<?php

namespace Database\Factories;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FloorFactory extends Factory
{
    protected $model = Floor::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'number' => fake()->randomNumber(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomNumber(),
        ];
    }
}