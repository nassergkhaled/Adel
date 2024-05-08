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
        // Generate start datetime between April 1 and June 30, 2024
        $start_date = $this->faker->dateTimeBetween('2024-04-01', '2024-06-30');
        
        // Determine the due date offset (1 day or 3 hours)
        $due_date_offset = $this->faker->boolean(30) ? '+3 hours' : '+1 day'; // 30% probability for 3-hour tasks
        
        // Set due datetime based on the calculated offset
        $due_date = (clone $start_date)->modify($due_date_offset);

        // Generate an optional completion datetime after the start date but before the due date
        $completion_date = $this->faker->optional()->dateTimeBetween($start_date, $due_date);

        return [
            'case_id' => LegalCase::inRandomOrder()->value('id') ?: null,
            'created_by' => User::inRandomOrder()->value('id') ?: User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_date' => $start_date->format('Y-m-d H:i:s'),
            'completion_date' => $completion_date ? $completion_date->format('Y-m-d H:i:s') : null,
            'due_date' => $due_date->format('Y-m-d H:i:s'),
            'status' => $this->faker->randomElement(['open', 'in_progress', 'completed', 'closed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
