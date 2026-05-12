<?php

namespace Database\Factories;

use App\Models\WebCounterSection;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebCounterSectionFactory extends Factory
{
    protected $model = WebCounterSection::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'number' => fake()->randomFloat(2, 0, 9999),
        ];
    }
}