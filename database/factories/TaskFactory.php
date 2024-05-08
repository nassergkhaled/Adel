<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\LegalCase;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Set a starting date range from April 1 to June 30, 2024
        $start_date = $this->faker->dateTimeBetween('2024-04-01', '2024-06-30');
        // Calculate a due date after the start date within the same range
        $due_date = $this->faker->dateTimeBetween($start_date, '2024-06-30');
        
        // Generate an optional completion date
        $completion_date = $this->faker->optional()->dateTimeBetween($start_date, '2024-06-30');

        return [
            'case_id' => LegalCase::inRandomOrder()->value('id') ?: null,
            'created_by' => User::inRandomOrder()->value('id') ?: User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_date' => $start_date->format('Y-m-d'),
            'completion_date' => $completion_date ? $completion_date->format('Y-m-d') : null,
            'due_date' => $start_date->format('Y-m-d'),
            'status' => $this->faker->randomElement(['open', 'in_progress', 'completed', 'closed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
