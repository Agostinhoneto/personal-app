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
        Schema::create('registros_treino', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treino_exercicio_id')->constrained('treino_exercicios')->onDelete('cascade');
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->date('data');
            $table->integer('series_realizadas')->nullable();
            $table->string('repeticoes_realizadas', 20)->nullable();
            $table->decimal('carga_utilizada', 5, 2)->nullable();
            $table->integer('percepcao_esforco')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_treino');
    }
};
