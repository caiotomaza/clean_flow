<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filial>
 */
class FilialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_fil' => $this->faker->unique()->numberBetween(5000, 9999),
            'id_emp' => Empresa::inRandomOrder()->value('id_emp'),
            'id_log' => Endereco::inRandomOrder()->value('id_log'),
            'nome' => $this->faker->company . ' Filial',
        ];
    }
}
