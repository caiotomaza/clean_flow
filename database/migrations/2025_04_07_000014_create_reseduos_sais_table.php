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
        Schema::create('reseduos_sais', function (Blueprint $table) {
            $table->unsignedBigInteger('id_saida')->primary();
            $table->unsignedBigInteger('id_arm')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_arm')->references('id_arm')->on('armazenamentos')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->timestamp('data_hora');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseduos_sais');
    }
};
