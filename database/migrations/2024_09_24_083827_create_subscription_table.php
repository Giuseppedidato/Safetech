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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            // Collegamento all'azienda
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');

            // Collegamento al tipo di abbonamento
            $table->foreignId('subscription_type_id')->constrained('subscription_types')->onDelete('cascade');

            // Data di inizio e di fine abbonamento
            $table->date('start_date'); // Data inizio abbonamento
            $table->date('end_date')->nullable(); // Data fine abbonamento (se applicabile)

            // Stato dell'abbonamento (attivo, sospeso, scaduto)
            $table->enum('status', ['active', 'suspended', 'expired'])->default('active');

            // Timestamp di creazione e aggiornamento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
