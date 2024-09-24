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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // Collega il ticket all'azienda
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Collega il ticket all'utente che lo ha creato
            $table->string('subject'); // Oggetto della richiesta di supporto
            $table->text('description'); // Descrizione della richiesta
            $table->enum('status', ['open', 'in_progress', 'resolved'])->default('open'); // Stato della richiesta
            $table->timestamps(); // Data di creazione e aggiornamento
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
