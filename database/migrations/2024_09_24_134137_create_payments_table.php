<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade'); // FK alla fattura
            $table->decimal('amount', 10, 2); // Importo del pagamento
            $table->string('payment_method')->nullable(); // Metodo di pagamento (es. carta, bonifico, ecc.)
            $table->date('payment_date')->nullable(); // Data di pagamento
            $table->string('transaction_id')->nullable(); // ID della transazione (in caso di pagamento elettronico)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
}
