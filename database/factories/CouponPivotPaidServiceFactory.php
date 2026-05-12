<?php

namespace Database\Factories;

use App\Models\CouponPivotPaidService;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponPivotPaidServiceFactory extends Factory
{
    protected $model = CouponPivotPaidService::class;

    public function definition(): array
    {
        return [
            'coupon_id' => fake()->randomNumber(),
            'paid_service_id' => fake()->randomNumber(),
        ];
    }
}