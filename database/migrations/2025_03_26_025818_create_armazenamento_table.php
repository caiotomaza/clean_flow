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
        Schema::create('armazenamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_residuo_id');
            $table->decimal('peso', 20, 2);
            $table->foreign('sub_residuo_id')->references('id')->on('sub_residuo');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armazenamento');
    }
};
