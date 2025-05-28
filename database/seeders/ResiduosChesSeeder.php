<?php

namespace Database\Seeders;

use App\Models\ResiduosChe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResiduosChesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar 50 registros fake
        ResiduosChe::factory()->count(20)->create();
    }
}
