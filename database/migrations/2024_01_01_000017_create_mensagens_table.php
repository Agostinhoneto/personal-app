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
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('remetente_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('destinatario_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('assunto', 100)->nullable();
            $table->text('mensagem');
            $table->boolean('lida')->default(false);
            $table->timestamp('data_leitura')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensagens');
    }
};
