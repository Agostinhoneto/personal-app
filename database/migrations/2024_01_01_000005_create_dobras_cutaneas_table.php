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
        Schema::create('dobras_cutaneas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avaliacao_id')->constrained('avaliacoes')->onDelete('cascade');
            $table->decimal('tricipital', 4, 1)->nullable();
            $table->decimal('subescapular', 4, 1)->nullable();
            $table->decimal('peitoral', 4, 1)->nullable();
            $table->decimal('axilar_media', 4, 1)->nullable();
            $table->decimal('suprailiaca', 4, 1)->nullable();
            $table->decimal('abdominal', 4, 1)->nullable();
            $table->decimal('coxa', 4, 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dobras_cutaneas');
    }
};
