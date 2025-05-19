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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'matricula' => $this->faker->unique()->numerify('##########'), // Ex: 1234567890
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
            'email_verified_at' => now(),
            'password' => bcrypt('senhaPadrao'), // Altere conforme necessário
            'remember_token' => Str::random(10),
        ];
    }
}
