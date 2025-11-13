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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // Ambos campos referencian a la tabla 'users'
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade'); // El cliente es un usuario
            $table->foreignId('employee_id')->constrained('users')->onDelete('cascade'); // El empleado es un usuario
            
            $table->foreignId('service_id')->constrained('services')->onDelete('restrict'); 
            
            // Logística de la cita
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
