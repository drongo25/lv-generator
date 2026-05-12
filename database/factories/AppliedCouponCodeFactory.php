<?php

namespace Database\Factories;

use App\Models\AppliedCouponCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppliedCouponCodeFactory extends Factory
{
    protected $model = AppliedCouponCode::class;

    public function definition(): array
    {
        return [
            'reservation_id' => fake()->randomNumber(),
            'coupon_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
            'date' => fake()->date(),
            'status' => fake()->randomNumber(),
            'coupon_type' => fake()->word(),
            'coupon_rate' => fake()->randomFloat(2, 0, 9999),
        ];
    }
}