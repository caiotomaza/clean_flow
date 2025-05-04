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
        Schema::create('empresas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_emp')->primary();
            $table->unsignedBigInteger('id_temp')->nullable(); // Criação da chave estrangeira.
            $table->foreign('id_temp')->references('id_temp')->on('tipo_empresas')->onDelete('set null'); // Criação da ligação da chave estrangeira.
            $table->text('nome_fans');
            $table->text('razao_social');
            $table->integer('cnpj');
            $table->integer('ie');
            $table->integer('im');
            $table->string('email');
            $table->string('telefone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
