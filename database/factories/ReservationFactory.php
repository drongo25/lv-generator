<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        return [
            'uid' => fake()->randomNumber(),
            'date' => fake()->dateTime(),
            'user_id' => fake()->randomNumber(),
            'room_type_id' => fake()->randomNumber(),
            'adults' => fake()->randomNumber(),
            'kids' => fake()->randomNumber(),
            'check_in' => fake()->date(),
            'check_out' => fake()->date(),
            'number_of_room' => fake()->randomNumber(),
            'status' => fake()->word(),
        ];
    }
}