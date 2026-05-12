<?php

namespace Database\Factories;

use App\Models\WebFacility;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebFacilityFactory extends Factory
{
    protected $model = WebFacility::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => fake()->word(),
        ];
    }
}