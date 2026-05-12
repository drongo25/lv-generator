<?php

namespace Database\Factories;

use App\Models\ReservationNight;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationNightFactory extends Factory
{
    protected $model = ReservationNight::class;

    public function definition(): array
    {
        return [
            'reservation_id' => fake()->randomNumber(),
            'room_id' => fake()->randomNumber(),
            'date' => fake()->date(),
            'check_in' => fake()->dateTime(),
            'check_out' => fake()->dateTime(),
            'price' => fake()->randomFloat(2, 0, 9999),
        ];
    }
}