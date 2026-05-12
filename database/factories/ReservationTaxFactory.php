<?php

namespace Database\Factories;

use App\Models\ReservationTax;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationTaxFactory extends Factory
{
    protected $model = ReservationTax::class;

    public function definition(): array
    {
        return [
            'reservation_id' => fake()->randomNumber(),
            'tax_id' => fake()->randomNumber(),
            'type' => fake()->word(),
            'value' => fake()->randomFloat(2, 0, 9999),
            'price' => fake()->randomFloat(2, 0, 9999),
        ];
    }
}