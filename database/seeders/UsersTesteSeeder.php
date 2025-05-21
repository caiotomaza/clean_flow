<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTesteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Teste1',
            'email' => 'teste@unifapce.com.br', 
            'matricula' => '9999', 
            'status' => 'Ativo', 
            'password' => Hash::make('Teste@123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10), // gera token aleatório
        ]);
    }
}