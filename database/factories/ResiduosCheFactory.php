<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Filial;
use App\Models\Veiculo;
use App\Models\Residuos;
use App\Models\SubResiduos;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResiduosChe>
 */
class ResiduosCheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sub = \App\Models\SubResiduos::inRandomOrder()->first();
        
        return [
            'id_filial' => Filial::inRandomOrder()->value('id_fil'),
            'id_vec' => Veiculo::inRandomOrder()->value('id_vec'),
            'id_resd' => $sub->id_resd, // pega o resíduo correspondente ao sub
            'id_sub_resd' => $sub->id_sub_resd,
            'id_responsavel' => User::inRandomOrder()->value('id'),
            'tipo_registro' => $this->faker->randomElement(['entrada', 'saida']),
            'peso' => $this->faker->randomFloat(2, 10, 1000),
            'data_hora' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
