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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('IdClient'); // Primary key
            $table->string('NomClient', 255);
            $table->string('PrenomClient', 255);
            $table->string('CinClient', 50)->unique(); // Unique CIN
            $table->string('phoneClient', 20); // Telephone number
            $table->date('DateNaiClient'); // Date of birth
            $table->string('EmailClient', 255)->unique(); // Unique email
            $table->unsignedBigInteger('IdUser'); // Foreign key to users table
            $table->string('StatusClient', 50); // Status of the client
            $table->timestamps(); // Adds created_at and updated_at columns

            // Foreign key constraint
            $table->foreign('IdUser')->references('IdUser')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
