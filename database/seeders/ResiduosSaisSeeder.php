<?php

namespace Database\Seeders;

use App\Models\ResiduosSai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResiduosSaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResiduosSai::factory()->count(20)->create();
    }
}
