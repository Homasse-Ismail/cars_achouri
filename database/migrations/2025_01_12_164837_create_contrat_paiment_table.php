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
        Schema::create('contrat_paiment', function (Blueprint $table) {
            $table->unsignedBigInteger('IdContrat');
            $table->unsignedBigInteger('IdPaiment');

            // Définir une clé primaire composite
            $table->primary(['IdContrat', 'IdPaiment']);

            // Définir les clés étrangères
            $table->foreign('IdContrat')->references('IdContrat')->on('contrats')->onDelete('cascade');
            $table->foreign('IdPaiment')->references('IdPaiment')->on('paiments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrat_paiment');
    }
};
