<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftDeleteRecoveryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('soft_delete_recovery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Utente che ha eliminato l'entità
            $table->string('entity_type'); // Tipo di entità eliminata (utente, dispositivo, ecc.)
            $table->unsignedBigInteger('entity_id'); // ID dell'entità eliminata
            $table->timestamp('deleted_at'); // Data e ora dell'eliminazione
            $table->timestamp('expires_at'); // Data di scadenza per il recupero
            $table->timestamps();

            // Relazione con la tabella users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soft_delete_recovery');
    }
}
