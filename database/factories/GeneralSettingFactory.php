<?php

namespace Database\Factories;

use App\Models\GeneralSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneralSettingFactory extends Factory
{
    protected $model = GeneralSetting::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'hotel_name' => fake()->name(),
            'hotel_email' => fake()->unique()->safeEmail(),
            'hotel_phone' => fake()->phoneNumber(),
            'hotel_address' => fake()->address(),
            'color' => fake()->word(),
            'cur' => fake()->word(),
            'cur_sym' => fake()->word(),
            'reg' => fake()->randomNumber(),
            'ev' => fake()->randomNumber(),
            'mv' => fake()->randomNumber(),
            'en' => fake()->randomNumber(),
            'mn' => fake()->randomNumber(),
            'sender_email' => fake()->unique()->safeEmail(),
            'email_message' => fake()->unique()->safeEmail(),
            'sms_api' => fake()->paragraph(),
            'meta_key_word' => fake()->paragraph(),
            'meta_description' => fake()->paragraph(),
            'meta_author' => fake()->word(),
        ];
    }
}