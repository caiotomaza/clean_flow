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
            $table->id('id_entrada'); 
            $table->unsignedBigInteger('id_vec')->nullable();
            $table->foreign('id_vec')->references('id_vec')->on('veiculos')->onDelete('set null');
        
            $table->decimal('peso', 20, 2);
            $table->timestamp('data_hora');
        
            $table->unsignedBigInteger('id_resd')->nullable();
            $table->foreign('id_resd')->references('id_resd')->on('reseduos')->onDelete('set null');
        
            $table->unsignedBigInteger('id_sub_resd')->nullable();
            $table->foreign('id_sub_resd')->references('id_sub_resd')->on('sub_reseduos')->onDelete('set null');
        
            $table->unsignedBigInteger('id_responsavel')->nullable();
            $table->foreign('id_responsavel')->references('id')->on('users')->onDelete('set null');

            $table->string('tipo_registro')->nullable();
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
