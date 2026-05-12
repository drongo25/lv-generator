<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{
    protected $model = RoomType::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->word(),
            'short_code' => fake()->word(),
            'description' => fake()->paragraph(),
            'base_capacity' => fake()->randomNumber(),
            'higher_capacity' => fake()->randomNumber(),
            'extra_bed' => fake()->randomNumber(),
            'kids_capacity' => fake()->randomNumber(),
            'base_price' => fake()->randomFloat(2, 0, 9999),
            'additional_person_price' => fake()->randomFloat(2, 0, 9999),
            'extra_bed_price' => fake()->randomFloat(2, 0, 9999),
            'status' => fake()->randomNumber(),
        ];
    }
}