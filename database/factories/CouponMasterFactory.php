<?php

namespace Database\Factories;

use App\Models\CouponMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponMasterFactory extends Factory
{
    protected $model = CouponMaster::class;

    public function definition(): array
    {
        return [
            'offer_title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'image' => fake()->word(),
            'period_start_time' => fake()->dateTime(),
            'period_end_time' => fake()->dateTime(),
            'code' => fake()->word(),
            'type' => fake()->word(),
            'value' => fake()->randomFloat(2, 0, 9999),
            'min_amount' => fake()->randomFloat(2, 0, 9999),
            'max_amount' => fake()->randomFloat(2, 0, 9999),
            'limit_per_user' => fake()->randomNumber(),
            'limit_per_coupon' => fake()->randomNumber(),
            'status' => fake()->randomNumber(),
        ];
    }
}