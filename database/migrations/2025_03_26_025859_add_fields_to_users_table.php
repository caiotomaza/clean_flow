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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('filial_id')->nullable()->constrained('filial')->onDelete('set null');
            $table->enum('tipo', ['administrador', 'operador', 'motorista'])->default('operador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['filial_id']);
            $table->dropColumn(['filial_id', 'tipo']);
        });
    }
};
