<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_lacking' => fake()->randomElement(),
            'user_id' => random_int(2, 50),
            'additional_banking_service' => fake()->randomElement(['yes', 'no', 'maybe'])
        ];
    }
}
