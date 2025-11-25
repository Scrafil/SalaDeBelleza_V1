<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            // Datos personales enfocados a clientes
            $table->string('document_type', 20)->nullable();
            $table->string('document_number', 50)->nullable();
            $table->string('name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('cellphone', 20)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->unsignedSmallInteger('age')->nullable();

            $table->timestamps();

            // Índices
            $table->index('document_number');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
