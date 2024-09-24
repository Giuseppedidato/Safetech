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
        Schema::create('subscription_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome del tipo di abbonamento (es. Basic, Pro, Premium)
            $table->text('description')->nullable(); // Descrizione dell'abbonamento
            $table->decimal('price', 8, 2); // Prezzo dell'abbonamento
            $table->integer('max_devices')->nullable(); // Numero massimo di dispositivi inclusi
            $table->boolean('support_included')->default(false); // Se include supporto
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_types');
    }
};
