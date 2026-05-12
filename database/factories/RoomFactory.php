<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition(): array
    {
        return [
            'room_type_id' => fake()->randomNumber(),
            'floor_id' => fake()->randomNumber(),
            'image' => fake()->word(),
            'number' => fake()->randomNumber(),
            'status' => fake()->randomNumber(),
        ];
    }
}