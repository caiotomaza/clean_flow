<?php

namespace Database\Seeders;

use App\Models\reseduosSai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReseduosSaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        reseduosSai::factory()->count(20)->create();
    }
}
