<?php

namespace Database\Factories;

use App\Models\WebOurTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebOurTeamFactory extends Factory
{
    protected $model = WebOurTeam::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'title' => fake()->sentence(),
            'fb' => fake()->word(),
            'tw' => fake()->word(),
            'lin' => fake()->word(),
            'gp' => fake()->word(),
            'image' => fake()->word(),
        ];
    }
}