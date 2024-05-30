<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(1),
            'description' => fake()->text(100),
            'price' => fake()->numberBetween(1, 7),
            'type' => fake()->text(100),
            'photo_before' => 'problem_' . fake()->numberBetween(1, 8) . '.jpg',
            'photo_after' => 'problem_' . fake()->numberBetween(1, 8) . '.jpg',
            // 'status' => fake()->randomElement(['Решена']),
            'status' => fake()->randomElement(['Модерация', 'Опубликовано', 'Отклонено']),
            'reason' => fake()->text(100),

            'user_id' => 2,
            'category_id' => fake()->numberBetween(1, 3),
        ];
    }
}
