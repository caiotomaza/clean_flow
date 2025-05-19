<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_log' => $this->faker->unique()->numberBetween(1000, 9999),
            'id_mun' => Municipio::inRandomOrder()->value('id_mun'),
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
        ];
    }
}
