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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id('IdContrat'); // Primary key
            $table->date('DateContrat'); // Contract date
            $table->unsignedBigInteger('IdEmployee'); // Foreign key to employe table
            $table->unsignedBigInteger('IdReservation'); // Foreign key to employe table
            $table->timestamps(); // Adds created_at and updated_at columns

            // Foreign key constraints
            $table->foreign('IdReservation')->references('IdReservation')->on('reservations')->onDelete('cascade');
            $table->foreign('IdEmployee')->references('IdEmployee')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
