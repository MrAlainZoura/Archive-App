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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conservateur_id')
                ->references('id')
                ->on('conservateurs')
                ->constrained()
                ->noActionOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('assujettie_id')
                ->references('id')
                ->on('assujetties')
                ->constrained()
                ->noActionOnDelete()
                ->cascadeOnUpdate();
            $table->string('libele');
            $table->longText('description');
            $table->date('date_dossier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
