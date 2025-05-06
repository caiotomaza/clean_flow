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
            $table->bigIncrements('id_arm');
            $table->string('container');
            $table->unsignedBigInteger('id_sub_resd')->nullable();
            $table->foreign('id_sub_resd')->references('id_sub_resd')->on('sub_reseduos')->onDelete('set null');
            $table->unsignedBigInteger('id_resd')->nullable();
            $table->foreign('id_resd')->references('id_resd')->on('reseduos')->onDelete('set null');
            $table->decimal('peso', 20, 2);
            $table->timestamp('data_hora');
            $table->string('tipo_registro')->nullable();
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
