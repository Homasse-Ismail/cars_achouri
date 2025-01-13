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
        Schema::create('agences', function (Blueprint $table) {
            $table->id('IdAgence'); // Primary key
            $table->string('NomAgence', 255);
            $table->string('AdresseAgence', 255);
            $table->string('VilleAgence', 255);
            $table->string('phoneAgence', 15); // For phone number or other contact
            $table->string('EmailAgence', 255)->unique(); // Ensures unique emails
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agences');
    }
};
