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
            'matricula' => $this->faker->unique()->numerify('##########'), 
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
            'email_verified_at' => now(),
            'password' => bcrypt('senhaPadrao'),
            'remember_token' => Str::random(10),
        ];
    }
}
