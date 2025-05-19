<?php

namespace Database\Seeders;

use App\Models\Reseduosche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReseduosChesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar 50 registros fake
        Reseduosche::factory()->count(20)->create();
    }
}
