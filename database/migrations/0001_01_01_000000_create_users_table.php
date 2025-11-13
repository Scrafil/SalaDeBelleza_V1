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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // TEMPORALMENTE, SÓLO CREAMOS LA COLUMNA role_id, NO LA CLAVE FORÁNEA.
            $table->unsignedBigInteger('role_id')->nullable(); 

            $table->string('name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('document_type', 10)->nullable();
            $table->string('document_number', 20)->unique()->nullable();
            $table->string('phone_number', 15)->nullable();
            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
