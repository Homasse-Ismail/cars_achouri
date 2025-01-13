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
        Schema::create('reservation_contrat', function (Blueprint $table) {
            $table->unsignedBigInteger('IdReservationC');
            $table->unsignedBigInteger('IdContratR');

            // Définir une clé primaire composite
            $table->primary(['IdReservationC', 'IdContratR']);

            // Définir les clés étrangères
            $table->foreign('IdReservationC')->references('IdReservation')->on('reservations')->onDelete('cascade');
            $table->foreign('IdContratR')->references('IdContrat')->on('contrats')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_contrat');
    }
};
