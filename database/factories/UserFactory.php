<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'tel' => fake()->numberBetween(1,6),
            'login' => fake(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role'=> 'user',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'login' => 'admin',
            'email' => 'admin@admin.net',
            'email_verified_at' => now(),
            'password' => Hash::make('sale'),
            'role' => 'admin',
        ]);
    }

    /**
     * Пользователь
     */
    public function user(): static
    {
        return $this->state(fn (array $attributes) => [
            'login' => 'user',
            'email' => 'user@user.net',
            'email_verified_at' => now(),
            'password' => Hash::make('user12345'),
            'role' => 'user',
        ]);
    }
}
