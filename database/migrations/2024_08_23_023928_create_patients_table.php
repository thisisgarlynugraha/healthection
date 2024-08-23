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
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->string('place_of_birth', 100);
            $table->date('date_of_birth');
            $table->boolean('family_history')->default(0);
            $table->boolean('history_of_smoking')->default(0);
            $table->double('bpm', 15, 2)->nullable();
            $table->double('systolic', 15, 2)->nullable();
            $table->double('diastolic', 15, 2)->nullable();
            $table->enum('status', ['Hipotensi', 'Normal', 'Pra-Hipertensi', 'Hipertensi Tingkat 1', 'Hipertensi Tingkat 2', 'Hipertensi Krisis'])->default('Normal');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number', 15);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
