<?php

namespace Database\Factories;

use App\Models\WebOurClientFeedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebOurClientFeedbackFactory extends Factory
{
    protected $model = WebOurClientFeedback::class;

    public function definition(): array
    {
        return [
            'feed' => fake()->paragraph(),
            'name' => fake()->name(),
            'title' => fake()->sentence(),
        ];
    }
}