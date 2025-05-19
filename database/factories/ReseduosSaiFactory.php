<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reseduosSai>
 */
class ReseduosSaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_saida' => $this->faker->unique()->randomNumber(),
            'id_filial' => $this->faker->numberBetween(1, 10),
            'id_arm' => $this->faker->numberBetween(1, 10),
            'id_vec' => $this->faker->numberBetween(1, 10),
            'data_hora' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tipo_registro' => $this->faker->randomElement(['entrada', 'saida']),
        ];
    }
}
