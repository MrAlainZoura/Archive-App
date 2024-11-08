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
        Schema::create('parcelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('titre_propriete_id')
                ->references('id')
                ->on('titre_proprietes')
                ->constrained()
                ->noActionOnDelete()
                ->cascadeOnUpdate();
            $table->string('adresse');
            $table->double('superficie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelles');
    }
};
