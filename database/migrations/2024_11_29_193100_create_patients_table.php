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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique(); // Assuming phone numbers are unique
            $table->unsignedBigInteger('country_id'); // Foreign key to countries table
            $table->string('address')->nullable(); // Nullable if address might not always be provided
            $table->enum('type', ['male', 'female']); // Example enum for patient type
            $table->enum('statement_type', ['gyn', 'male'])->default('gyn'); // Example enum for statement type
            $table->timestamps();

            // Adding a foreign key constraint
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
