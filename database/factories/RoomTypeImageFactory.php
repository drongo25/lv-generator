<?php

namespace Database\Factories;

use App\Models\RoomTypeImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeImageFactory extends Factory
{
    protected $model = RoomTypeImage::class;

    public function definition(): array
    {
        return [
            'image' => fake()->word(),
            'room_type_id' => fake()->randomNumber(),
            'featured' => fake()->randomNumber(),
        ];
    }
}