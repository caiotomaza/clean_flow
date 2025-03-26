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
        Schema::create('sub_residuo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_residuo_id');
            $table->string('nome', 25)->unique();
            $table->timestamps();

            $table->foreign('tipo_residuo_id')->references('id')->on('tipo_residuo')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_residuo');
    }
};
