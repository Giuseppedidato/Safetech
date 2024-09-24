<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // FK verso companies
            $table->unsignedBigInteger('device_id');  // FK verso devices
            $table->timestamp('assigned_at')->nullable(); // Data di assegnazione del dispositivo all'azienda
            $table->timestamps();

            // Foreign Keys
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_devices');
    }
};
