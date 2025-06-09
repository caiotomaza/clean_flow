<?php

namespace Database\Seeders;

use App\Models\Residuos;
use App\Models\ResiduosChe;
use App\Models\SubResiduos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResiduosChesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Residuos::count() === 0 || SubResiduos::count() === 0) {
            $this->command->warn('Nenhum resíduo ou sub-resíduo encontrado. Execute ResiduoSeeder antes.');
            return;
        }
        // Criar 50 registros fake
        ResiduosChe::factory()->count(20)->create();
    }
}
