<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'gateway_id' => fake()->randomNumber(),
            'amount' => fake()->randomFloat(2, 0, 9999),
            'remarks' => fake()->word(),
            'trx' => fake()->word(),
            'status' => fake()->word(),
            'type' => fake()->word(),
        ];
    }
}