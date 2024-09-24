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
        Schema::create('user_companies', function (Blueprint $table) {
            $table->id();

            // Foreign key dell'utente
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Foreign key dell'azienda
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');

            // Ruolo dell'utente all'interno dell'azienda
            $table->string('role_in_company')->nullable(); // Può essere amministratore, dipendente, supervisore, ecc.

            // Timestamp di creazione e aggiornamento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_companies');
    }
};
