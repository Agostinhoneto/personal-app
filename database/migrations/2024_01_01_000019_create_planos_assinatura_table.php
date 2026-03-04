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
        Schema::create('planos_assinatura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained('personais')->onDelete('cascade');
            $table->string('nome', 50);
            $table->text('descricao')->nullable();
            $table->decimal('valor', 10, 2);
            $table->integer('duracao_dias')->default(30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planos_assinatura');
    }
};
