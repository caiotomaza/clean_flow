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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_log')->primary();
            $table->unsignedBigInteger('id_mun')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_mun')->references('id_mun')->on('municipios')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->string('logradouro');
            $table->bigInteger('numero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
