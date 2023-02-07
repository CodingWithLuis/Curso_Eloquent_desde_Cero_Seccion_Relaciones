<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone_number1' => fake()->phoneNumber(),
            'phone_number2' => fake()->phoneNumber(),
            'address1' => fake()->address(),
            'address2' => fake()->address(),
            'facebook_profile' => fake()->userName(),
            'instagram_profile' => fake()->userName(),
            'twitter_profile' => fake()->userName(),
            'user_id' => rand(1, 10),
        ];
    }
}
