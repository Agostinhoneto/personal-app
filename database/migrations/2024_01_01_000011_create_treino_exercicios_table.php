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
        Schema::create('treino_exercicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treino_id')->constrained('treinos')->onDelete('cascade');
            $table->foreignId('exercicio_id')->constrained('exercicios')->onDelete('cascade');
            $table->integer('series')->nullable();
            $table->string('repeticoes', 20)->nullable();
            $table->decimal('carga', 5, 2)->nullable();
            $table->integer('tempo_descanso')->nullable();
            $table->text('observacoes')->nullable();
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treino_exercicios');
    }
};
