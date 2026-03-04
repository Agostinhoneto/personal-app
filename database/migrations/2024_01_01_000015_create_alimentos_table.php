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
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('porcao', 50)->nullable();
            $table->integer('calorias')->nullable();
            $table->decimal('proteinas', 5, 2)->nullable();
            $table->decimal('carboidratos', 5, 2)->nullable();
            $table->decimal('gorduras', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentos');
    }
};
