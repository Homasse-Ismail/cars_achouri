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
        Schema::create('paiments', function (Blueprint $table) {
            $table->id('IdPaiment'); // Primary key
            $table->date('DatePaiment'); // Payment date
            $table->decimal('MontantTotal', 10, 2); // Total payment amount (decimal with 2 decimal places)
            $table->string('MethodPaiment', 100); // Payment method
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiments');
    }
};
