<?php

namespace Database\Factories;

use App\Models\RoomTypePivotAmenity;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypePivotAmenityFactory extends Factory
{
    protected $model = RoomTypePivotAmenity::class;

    public function definition(): array
    {
        return [
            'room_type_id' => fake()->randomNumber(),
            'amenity_id' => fake()->randomNumber(),
        ];
    }
}