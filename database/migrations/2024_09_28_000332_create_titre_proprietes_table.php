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
        Schema::create('titre_proprietes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assujettie_id')
                ->references('id')
                ->on('assujetties')
                ->constrained()
                ->noActionOnDelete()
                ->cascadeOnUpdate();
            $table->string('numero');
            $table->longText('description');
            $table->string('libele');
            $table->date('date_titre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titre_proprietes');
    }
};
