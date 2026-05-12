<?php

namespace Database\Factories;

use App\Models\CouponPivotIncludeRoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponPivotIncludeRoomTypeFactory extends Factory
{
    protected $model = CouponPivotIncludeRoomType::class;

    public function definition(): array
    {
        return [
            'coupon_id' => fake()->randomNumber(),
            'room_type_id' => fake()->randomNumber(),
        ];
    }
}