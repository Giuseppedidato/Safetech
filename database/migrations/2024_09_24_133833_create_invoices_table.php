<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // FK all'azienda
            $table->foreignId('subscription_id')->constrained()->onDelete('cascade'); // FK all'abbonamento
            $table->string('invoice_number')->unique(); // Numero fattura
            $table->decimal('amount', 10, 2); // Importo totale della fattura
            $table->date('due_date'); // Data di scadenza della fattura
            $table->enum('status', ['paid', 'pending', 'cancelled'])->default('pending'); // Stato della fattura
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
}
