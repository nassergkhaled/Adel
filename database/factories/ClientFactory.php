<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use App\Models\LawyerClient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $signupToken = Str::random(20);
        $lawyerIds = [1, 2, 3]; // Assuming these are the lawyer ids

        return [
            'full_name' => $this->faker->name,
            'id_number' => $this->faker->unique()->randomNumber(8),
            'phone_number' => $this->faker->unique()->phoneNumber,
            'signupToken' => 'client-' . $signupToken,
            'user_id' => User::factory()->create()->id,
            
        ];
    }
}
