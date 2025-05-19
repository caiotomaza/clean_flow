<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Armazenamento>
 */
class ArmazenamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'container' => $this->faker->bothify('Container-###??'),
            'id_sub_resd' => $this->faker->numberBetween(1, 10),
            'id_resd' => $this->faker->numberBetween(1, 10),
            'peso' => $this->faker->randomFloat(2, 0, 1000),
            'data_hora' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tipo_registro' => $this->faker->randomElement(['entrada', 'saida']),
        ];
    }
}
