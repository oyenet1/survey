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
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->e164PhoneNumber(),
            'role' => 'enumerator',
            'ward' => fake()->randomElement([
                'Babbangida',
                'Bade',
                'Bursari',
                'Damaturu',
                'Fika',
                'Fune',
                'Geidam',
                'Gujba',
                'Gulani',
                'Jakusko',
                'Karasuwa',
                'Machina',
                'Nangere',
                'Nguru',
                'Potiskum',
                'Tarmuwa',
                'Yunusari',
                'Yusufari'
            ]),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
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
}
