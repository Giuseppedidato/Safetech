<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // L'utente che ha eseguito l'azione
            $table->string('action'); // Azione eseguita (es. "Login", "Modifica Dati", ecc.)
            $table->unsignedBigInteger('target_id')->nullable(); // ID del target (utente o dispositivo)
            $table->string('target_type')->nullable(); // Tipo del target (utente, dispositivo, ecc.)
            $table->string('ip_address')->nullable(); // Indirizzo IP dell'utente
            $table->timestamp('timestamp'); // Data e ora dell'azione
            $table->text('details')->nullable(); // Dettagli aggiuntivi sull'azione
            $table->timestamps();

            // Relazione con la tabella users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
}
