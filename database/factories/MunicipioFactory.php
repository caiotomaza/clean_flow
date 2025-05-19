<?php

namespace Database\Factories;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Municipio>
 */
class MunicipioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_mun' => $this->faker->unique()->numberBetween(100, 999),
            'id_est' => Estado::inRandomOrder()->value('id_est'),
            'nome' => $this->faker->city,
        ];
    }
}
