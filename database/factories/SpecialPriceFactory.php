<?php

namespace Database\Factories;

use App\Models\SpecialPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialPriceFactory extends Factory
{
    protected $model = SpecialPrice::class;

    public function definition(): array
    {
        return [
            'room_type_id' => fake()->randomNumber(),
            'title' => fake()->sentence(),
            'start_time' => fake()->dateTime(),
            'end_time' => fake()->dateTime(),
            'day_1' => fake()->word(),
            'day_1_amount' => fake()->randomFloat(2, 0, 9999),
            'day_2' => fake()->word(),
            'day_2_amount' => fake()->randomFloat(2, 0, 9999),
            'day_3' => fake()->word(),
            'day_3_amount' => fake()->randomFloat(2, 0, 9999),
            'day_4' => fake()->word(),
            'day_4_amount' => fake()->randomFloat(2, 0, 9999),
            'day_5' => fake()->word(),
            'day_5_amount' => fake()->randomFloat(2, 0, 9999),
            'day_6' => fake()->word(),
            'day_6_amount' => fake()->randomFloat(2, 0, 9999),
            'day_7' => fake()->word(),
            'day_7_amount' => fake()->randomFloat(2, 0, 9999),
            'status' => fake()->randomNumber(),
        ];
    }
}