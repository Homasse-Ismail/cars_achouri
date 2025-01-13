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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id('IdVehicule'); // Primary key
            $table->string('Matricule', 50)->unique(); // Unique vehicle registration number
            $table->string('Marque', 255); // Vehicle brand
            $table->string('Model', 255); // Vehicle model
            $table->integer('Annee'); // Year of manufacture
            $table->string('Type', 100); // Type of vehicle
            $table->decimal('PrixJour', 8, 2); // Price per day (decimal with 2 decimals)
            $table->unsignedBigInteger('IdAgence'); // Foreign key to agence table
            $table->char('StatuVehicule', 1); // Vehicle status: 'M', 'R', or 'D'
            $table->timestamps(); // Adds created_at and updated_at columns

            // Foreign key constraints
            $table->foreign('IdAgence')->references('IdAgence')->on('agences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
