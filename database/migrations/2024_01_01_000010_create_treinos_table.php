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
        Schema::create('treinos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->foreignId('personal_id')->constrained('personais')->onDelete('cascade');
            $table->string('nome', 100);
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->text('objetivo')->nullable();
            $table->enum('status', ['ativo', 'inativo', 'concluido'])->default('ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treinos');
    }
};
