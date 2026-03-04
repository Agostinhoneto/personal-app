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
        Schema::create('exercicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personais')->onDelete('cascade');
            $table->string('nome', 100);
            $table->foreignId('categoria_id')->constrained('categorias_treino')->onDelete('cascade');
            $table->text('descricao')->nullable();
            $table->string('video_url', 255)->nullable();
            $table->string('imagem', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercicios');
    }
};
