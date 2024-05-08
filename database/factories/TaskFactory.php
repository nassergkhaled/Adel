<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\LegalCase;
use DateTime;
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
        $start_date = $this->faker->dateTimeBetween('2024-04-01 00:00:00', '2024-06-30 11:59:59');
        // Calculate a due date after the start date within the same range
        $due_date = $this->faker->dateTimeBetween($start_date, '2024-06-30');

        // Generate an optional completion date
        $completion_date = $this->faker->optional()->dateTimeBetween($start_date, '2024-06-30 11:59:59');

        return [
            'case_id' => LegalCase::inRandomOrder()->value('id') ?: null,
            'created_by' => User::inRandomOrder()->value('id') ?: User::factory(),
            'title' => $this->faker->randomElement(['قضية', 'تجهيز اوراق', 'اكبال بحث', 'مراجعة الجلسات']),
            'description' => $this->faker->paragraph,
            // 'start_date' => $start_date->format('Y-m-d H:i:s'),
            'completion_date' => $completion_date ? $completion_date->format('Y-m-d') : null,
            'start_date' => $this->faker->dateTimeBetween('2024-04-01 00:00:00', '2024-06-30 23:59:59')->format('Y-m-d H:i:s'),
            'due_date' => function (array $attributes) {
                // Convert start_date back to a DateTime object
                $startDate = new DateTime($attributes['start_date']);
                // Add an interval of 3 hours
                return $startDate->modify('+3 hours')->format('Y-m-d H:i:s');
            },

            'status' => $this->faker->randomElement(['open', 'in_progress', 'completed', 'closed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
