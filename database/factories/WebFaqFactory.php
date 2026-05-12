<?php

namespace Database\Factories;

use App\Models\WebFaq;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebFaqFactory extends Factory
{
    protected $model = WebFaq::class;

    public function definition(): array
    {
        return [
            'question' => fake()->word(),
            'answer' => fake()->paragraph(),
        ];
    }
}