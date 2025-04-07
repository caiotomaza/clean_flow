<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filials', function (Blueprint $table) {
            $table->unsignedBigInteger('id_fil')->primary();
            $table->unsignedBigInteger('id_emp')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_emp')->references('id_emp')->on('empresas')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->unsignedBigInteger('id_log')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_log')->references('id_log')->on('enderecos')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filials');
    }
};
