<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role' => $this->faker->randomElement(['student']),
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->lastName(),
            'lastname' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['M', 'F']),
            'email' => $this->faker->email(),
            'password' => bcrypt('password'), // password
            'cover_image' => $this->faker->randomElement(['male.jpg', 'female.jpg']),
            'status' => '1',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
