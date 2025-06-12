<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Residuos;
use App\Models\SubResiduos;

class ResiduoSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            'Plástico' => ['Garrafa PET', 'Sacos plásticos', 'Embalagem de iogurte'],
            'Metal' => ['Lata de alumínio', 'Fio de cobre', 'Tampa metálica'],
            'Vidro' => ['Garrafa de vidro', 'Pote de conserva', 'Caco de vidro'],
            'Papel' => ['Jornal', 'Revista', 'Papelão'],
            'Orgânico' => ['Restos de comida', 'Casca de fruta', 'Borra de café'],
            'Eletrônico' => ['Celular quebrado', 'Placa-mãe', 'Carregador'],
            'Têxtil' => ['Roupas velhas', 'Tecidos rasgados', 'Meias'],
        ];

        foreach ($tipos as $tipo => $subTipos) {
            $residuo = Residuos::create(['nome' => $tipo]);

            foreach ($subTipos as $index => $sub) {
                SubResiduos::create([
                    'id_sub_resd' => fake()->unique()->numberBetween(1000, 9999),
                    'id_resd' => $residuo->id_resd,
                    'nome' => $sub,
                ]);
            }
        }
    }
}
