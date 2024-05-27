<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->name(),
            'role' => 'admin',
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' => bcrypt('12345'), // password
            // 'remember_token' => Str::random(10),
        ];
    }

    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
