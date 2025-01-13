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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('IdEmployee'); // Primary key
            $table->string('NomEmployee', 255);
            $table->string('PrenomEmployee', 255);
            $table->string('EmailEmployee', 255)->unique(); // Unique email
            $table->string('PostEmployee', 255); // Job title or position
            $table->unsignedBigInteger('IdUser'); // Foreign key to users table
            $table->unsignedBigInteger('IdAgence'); // Foreign key to agence table
            $table->unsignedBigInteger('IdPoste'); // Foreign key to poste table
            $table->timestamps(); // Adds created_at and updated_at columns

            // Foreign key constraints
            $table->foreign('IdUser')->references('IdUser')->on('users')->onDelete('cascade');
            $table->foreign('IdAgence')->references('IdAgence')->on('agences')->onDelete('cascade');
            $table->foreign('IdPoste')->references('IdPoste')->on('postes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
