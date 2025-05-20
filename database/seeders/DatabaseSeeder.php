<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ResiduosSeeder as SeedersResiduosSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use ResiduosSeeder;

class DatabaseSeeder extends Seeder{
    public function run(): void{

        Schema::disableForeignKeyConstraints();
        // Criação de usuários
        \App\Models\User::factory(10)->create();

        // Localização
        \App\Models\Estado::factory(5)->create();
        \App\Models\Municipio::factory(15)->create();
        \App\Models\Endereco::factory(15)->create();

        // Empresas
        \App\Models\TipoEmpresa::factory(5)->create();
        \App\Models\Empresa::factory(10)->create();
        \App\Models\Filial::factory(10)->create();

        // Veículos
        \App\Models\Veiculo::factory(10)->create();

        // Chamando os seeders relacionados aos modelos acima
        $this->call([
            ReseduosChesSeeder::class,
            ReseduosSaisSeeder::class,
            ArmazenamentosSeeder::class,
            UsersTesteSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}