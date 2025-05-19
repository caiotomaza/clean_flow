<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Veiculo::factory()->count(10)->create();
    }
}
