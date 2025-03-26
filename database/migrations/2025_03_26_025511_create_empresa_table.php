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
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('endereco_id');
            $table->string('nome_fantasia', 40);
            $table->string('razao_social', 50);
            $table->char('cnpj', 14)->unique();
            $table->string('ie', 15)->nullable();
            $table->string('im', 15)->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->string('telefone', 14)->nullable();
            $table->enum('tipo', ['coletora', 'receptora']);
            $table->timestamps();

            $table->foreign('endereco_id')->references('id')->on('endereco')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresa');
    }
};
