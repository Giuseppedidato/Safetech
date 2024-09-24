<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('regione_sociale'); // Ragione Sociale dell'azienda
            $table->string('indirizzo'); // Indirizzo sede legale/operativa
            $table->string('email')->unique(); // Email dell'azienda
            $table->string('telefono')->nullable(); // Numero di telefono dell'azienda
            $table->string('codice_destinatario', 7)->nullable(); // Codice destinatario per fatturazione elettronica
            $table->string('pec')->nullable(); // PEC per fatturazione elettronica
            $table->string('codice_univoco_sdi')->nullable(); // Codice univoco SDI
            $table->string('registro_imprese')->nullable(); // Numero di iscrizione al registro imprese
            $table->string('cf_rappresentante_legale')->nullable(); // Codice fiscale del rappresentante legale

            // Dati fiscali
            $table->string('partita_iva')->nullable(); // Partita IVA dell'azienda
            $table->string('codice_fiscale')->nullable(); // Codice fiscale (se diverso dalla Partita IVA)

            // Dati del contatto principale
            $table->string('contatto_nome'); // Nome del contatto principale
            $table->string('contatto_email')->nullable(); // Email del contatto principale
            $table->string('contatto_telefono')->nullable(); // Telefono del contatto principale
            $table->foreignId('contatto_ruolo_id')->constrained('roles')->nullable(); // Ruolo del contatto principale (FK a ruoli)

            // Dati per la fatturazione
            $table->string('indirizzo_fatturazione')->nullable(); // Indirizzo per la fatturazione
            $table->string('email_fatturazione')->nullable(); // Email per la fatturazione
            $table->string('iban')->nullable(); // IBAN per pagamenti
            $table->string('metodo_pagamento')->nullable(); // Metodo di pagamento (es. Bonifico, Carta di Credito)
            $table->string('valuta')->nullable()->default('EUR'); // Valuta predefinita

            // Altri dati
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
