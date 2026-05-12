<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'sex' => fake()->word(),
            'picture' => fake()->word(),
            'status' => fake()->randomNumber(),
            'password' => bcrypt(fake()->password()),
            'remember_token' => fake()->word(),
            'role' => fake()->randomNumber(),
        ];
    }
}