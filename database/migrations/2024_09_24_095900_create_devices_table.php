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
    {Schema::create('devices', function (Blueprint $table) {
        $table->id();  // ID univoco del dispositivo
        $table->string('serial_number')->unique();  // Numero seriale univoco del dispositivo
        $table->string('mac_address')->unique();  // Indirizzo MAC per il tracciamento del dispositivo
        $table->unsignedBigInteger('device_type_id');  // Tipo di dispositivo (FK verso device_types)
        $table->enum('status',['active','inactive','maintenance'])->default('active');  // Stato del dispositivo (attivo, inattivo, manutenzione)
        $table->timestamps();  // created_at e updated_at

        // Chiave esterna verso la tabella device_types
        $table->foreign('device_type_id')->references('id')->on('device_types')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
