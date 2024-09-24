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
        Schema::create('device_types', function (Blueprint $table) {
            $table->id();  // ID univoco del tipo di dispositivo
            $table->string('name');  // Nome del tipo di dispositivo (es. "Safe Helmet", "Sensor")
            $table->string('description')->nullable();  // Descrizione del tipo di dispositivo
            $table->timestamps();  // created_at e updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_types');
    }
};
