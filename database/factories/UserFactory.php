<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'dob' => fake()->date(),
            'address' => fake()->address(),
            'sex' => fake()->word(),
            'picture' => fake()->word(),
            'password' => bcrypt(fake()->password()),
            'id_type' => fake()->word(),
            'id_number' => fake()->word(),
            'id_card_image' => fake()->word(),
            'remarks' => fake()->paragraph(),
            'vip' => fake()->randomNumber(),
            'email_verified' => fake()->unique()->safeEmail(),
            'email_verified_code' => fake()->unique()->safeEmail(),
            'sms_verified' => fake()->randomNumber(),
            'sms_verified_code' => fake()->word(),
            'status' => fake()->randomNumber(),
            'remember_token' => fake()->word(),
        ];
    }
}