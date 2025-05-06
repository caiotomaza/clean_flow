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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_vec')->primary();
            $table->unsignedBigInteger('id_fil')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_fil')->references('id_fil')->on('filials')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->string('placa');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
