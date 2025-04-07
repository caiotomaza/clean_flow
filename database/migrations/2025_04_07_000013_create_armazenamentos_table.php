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
        Schema::create('armazenamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_arm')->primary();
            $table->unsignedBigInteger('id_sub_resd')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_sub_resd')->references('id_sub_resd')->on('sub_reseduos')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->unsignedBigInteger('id_entrada')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_entrada')->references('id_entrada')->on('reseduos_ches')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->decimal('peso', 20, 2);
            $table->timestamp('data_hora');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armazenamentos');
    }
};
