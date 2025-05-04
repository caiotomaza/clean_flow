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
        Schema::create('sub_reseduos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sub_resd')->primary();
            $table->unsignedBigInteger('id_resd')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_resd')->references('id_resd')->on('reseduos')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->string('nome');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_reseduos');
    }
};
