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
        Schema::create('reseduos_ches', function (Blueprint $table) {
            $table->unsignedBigInteger('id_entrada')->primary();
            $table->unsignedBigInteger('id_vec')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_vec')->references('id_vec')->on('veiculos')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->decimal('peso', 20, 2);
            $table->timestamp('data_hora');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseduos_ches');
    }
};
