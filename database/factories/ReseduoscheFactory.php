<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Filial;
use App\Models\Reseduos;
use App\Models\Veiculo;
use App\Models\Residuos;
use App\Models\Sub_reseduos;
use App\Models\SubReseduos;
use App\Models\SubResiduos;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reseduosche>
 */
class ReseduoscheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_filial' => Filial::inRandomOrder()->value('id_fil'),
            'id_vec' => Veiculo::inRandomOrder()->value('id_vec'),
            'id_resd' => Reseduos::inRandomOrder()->value('id_resd'), // corrigido
            'id_sub_resd' => SubReseduos::inRandomOrder()->value('id_sub_resd'), // ajuste conforme nome da PK
            'id_responsavel' => User::inRandomOrder()->value('id'),
            'tipo_registro' => $this->faker->randomElement(['entrada', 'saida']),
            'peso' => $this->faker->randomFloat(2, 10, 1000),
            'data_hora' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
