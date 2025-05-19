<?php

namespace Database\Factories;

use App\Models\TipoEmpresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_emp' => $this->faker->unique()->numberBetween(10000, 20000),
            'id_temp' => TipoEmpresa::inRandomOrder()->value('id_temp'),
            'nome_fans' => $this->faker->company,
            'razao_social' => $this->faker->company,
            'cnpj' => (string) $this->faker->numerify('##############'),
            'ie' => $this->faker->numerify('########'),
            'im' => $this->faker->numerify('########'),
            'email' => $this->faker->unique()->companyEmail,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}
