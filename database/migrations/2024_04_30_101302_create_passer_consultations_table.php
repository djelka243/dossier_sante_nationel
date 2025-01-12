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
        Schema::create('passer_consultations', function (Blueprint $table) {
            
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('medecin_id')->constrained();
            $table->foreignId('consultation_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passer_consultations');
    }
};
