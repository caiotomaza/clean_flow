<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Estados
         DB::table('estados')->insert([
            'id_est' => 1,
            'uf' => 'PE',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Municípios
        DB::table('municipios')->insert([
            'id_mun' => 1,
            'id_est' => 1,
            'nome' => 'Granito',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Endereços
        DB::table('enderecos')->insert([
            'id_log' => 1,
            'id_mun' => 1,
            'logradouro' => 'Rua Principal',
            'numero' => 100,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Tipo de empresa
        DB::table('tipo_empresas')->insert([
            'id_temp' => 1,
            'nome' => 'Cooperativa',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Empresa
        DB::table('empresas')->insert([
            'id_emp' => 1,
            'id_temp' => 1,
            'nome_fans' => 'EcoCoop',
            'razao_social' => 'Cooperativa Eco Ambiental',
            'cnpj' => 12345678,
            'ie' => 112233,
            'im' => 445566,
            'email' => 'contato@ecocoop.com',
            'telefone' => 81999999999,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Filial
        DB::table('filials')->insert([
            'id_fil' => 1,
            'id_emp' => 1,
            'id_log' => 1,
            'nome' => 'Filial Granito',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Veículos (3)
        DB::table('veiculos')->insert([
            ['id_vec' => 1, 'id_fil' => 1, 'placa' => 'ABC-1234', 'created_at' => now(), 'updated_at' => now()],
            ['id_vec' => 2, 'id_fil' => 1, 'placa' => 'XYZ-5678', 'created_at' => now(), 'updated_at' => now()],
            ['id_vec' => 3, 'id_fil' => 1, 'placa' => 'LMN-9012', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Resíduos (3)
        DB::table('reseduos')->insert([
            ['id_resd' => 1, 'nome' => 'Plástico'],
            ['id_resd' => 2, 'nome' => 'Metal'],
            ['id_resd' => 3, 'nome' => 'Vidro'],
        ]);

        // Sub-resíduos (3 ligados a resíduos)
        DB::table('sub_reseduos')->insert([
            ['id_sub_resd' => 1, 'id_resd' => 1, 'nome' => 'PET'],
            ['id_sub_resd' => 2, 'id_resd' => 2, 'nome' => 'Alumínio'],
            ['id_sub_resd' => 3, 'id_resd' => 3, 'nome' => 'Garrafa de vidro'],
        ]);
    }
}
