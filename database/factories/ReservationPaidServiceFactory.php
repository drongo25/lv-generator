<?php

namespace Database\Factories;

use App\Models\ReservationPaidService;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationPaidServiceFactory extends Factory
{
    protected $model = ReservationPaidService::class;

    public function definition(): array
    {
        return [
            'reservation_id' => fake()->randomNumber(),
            'pad_service_id' => fake()->randomNumber(),
            'price_type' => fake()->word(),
            'value' => fake()->randomFloat(2, 0, 9999),
            'price' => fake()->randomFloat(2, 0, 9999),
        ];
    }
}