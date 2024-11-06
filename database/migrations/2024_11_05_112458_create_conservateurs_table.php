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
        Schema::create('conservateurs', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('genre');
            $table->string('adresse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conservateurs');
    }
};
