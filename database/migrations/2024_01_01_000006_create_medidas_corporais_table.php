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
        Schema::create('medidas_corporais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avaliacao_id')->constrained('avaliacoes')->onDelete('cascade');
            $table->decimal('torax', 5, 1)->nullable();
            $table->decimal('cintura', 5, 1)->nullable();
            $table->decimal('abdomen', 5, 1)->nullable();
            $table->decimal('quadril', 5, 1)->nullable();
            $table->decimal('braco_direito', 5, 1)->nullable();
            $table->decimal('braco_esquerdo', 5, 1)->nullable();
            $table->decimal('antebraco_direito', 5, 1)->nullable();
            $table->decimal('antebraco_esquerdo', 5, 1)->nullable();
            $table->decimal('coxa_direita', 5, 1)->nullable();
            $table->decimal('coxa_esquerda', 5, 1)->nullable();
            $table->decimal('panturrilha_direita', 5, 1)->nullable();
            $table->decimal('panturrilha_esquerda', 5, 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas_corporais');
    }
};
