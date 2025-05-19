<?php

namespace Database\Seeders;

use App\Models\Armazenamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmazenamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Armazenamento::factory()->count(20)->create();
    }
}
