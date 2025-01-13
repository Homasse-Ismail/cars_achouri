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
        Schema::create('postes', function (Blueprint $table) {
            $table->id('IdPoste'); // Primary key
            $table->string("NomPoste");
            $table->timestamps(); // Adds created_at and updated_at columns

            // Foreign key constraint
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
