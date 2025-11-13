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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Relación clave a la cita
            $table->foreignId('appointment_id')->unique()->constrained('appointments')->onDelete('cascade'); // Una transacción por cita
            
            $table->decimal('amount_paid', 8, 2);
            $table->string('payment_method')->default('cash'); // cash, card, transfer, etc.
            $table->timestamp('paid_at'); // Fecha y hora real del pago
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
