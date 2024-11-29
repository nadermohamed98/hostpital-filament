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
        Schema::create('surgeries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id'); // Foreign key for patients
            $table->unsignedBigInteger('doctor_id'); // Foreign key for patients
            $table->string('name');
            $table->enum('type', ['gyn', 'male']); // Type of surgery
            $table->float('amount');
            $table->float('paid');
            $table->date('performed_at'); // Date of the surgery
            $table->text('notes')->nullable(); // Additional notes about the surgery
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('patient_id')->references('id')->on('patients')->cascadeOnDelete();
            $table->foreign('doctor_id')->references('id')->on('doctors')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surgeries');
    }
};
