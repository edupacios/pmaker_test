<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'user_id' => \App\Models\User::factory()->create()->id,
            'description' => fake()->sentence,
            'code' => fake()->randomNumber(),
            'status' => fake()->randomElement(['active', 'inactive'], 'active'),
        ];
    }
}
