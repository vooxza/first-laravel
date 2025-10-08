<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['MTK', 'Inggris', 'Bahasa Indonesia', 'Bahasa jawa', 'Bahasa jepang']),
            'description' => fake()->unique()->randomElement(['Matematika', 'mapel inggriss', 'mapel bahasa indonesia', 'mapel bahasa jawa', 'mapel bahasa jepang']),
        ];
    }
}