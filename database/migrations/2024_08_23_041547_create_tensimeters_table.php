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
        Schema::create('tensimeters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('patient_id');
            $table->double('bpm', 15, 2);
            $table->double('systolic', 15, 2);
            $table->double('diastolic', 15, 2);
            $table->timestamps();

            $table->index('patient_id')->references('id')->on('patients')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tensimeters');
    }
};
