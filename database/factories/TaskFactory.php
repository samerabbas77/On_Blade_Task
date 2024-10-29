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
            'title' => $this->faker->sentence(3),  // Generates a random title with 3 words
            'description' => $this->faker->paragraph(2),  // Generates a random description
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),  // Random due date between now and 1 year later
            'status' => $this->faker->randomElement(['Pending','Completed']),  // Random status
            'user_id' => $this->faker->randomElement([1, 2]),  // Randomly assigns user_id to either 1 or 2
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
