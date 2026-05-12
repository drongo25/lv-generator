<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'gateway_id' => fake()->randomNumber(),
            'amount' => fake()->randomFloat(2, 0, 9999),
            'usd_amo' => fake()->randomFloat(2, 0, 9999),
            'trx' => fake()->word(),
            'status' => fake()->randomNumber(),
            'try' => fake()->randomNumber(),
            'btc_amo' => fake()->randomFloat(2, 0, 9999),
            'btc_wallet' => fake()->randomFloat(2, 0, 9999),
        ];
    }
}