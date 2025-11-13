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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // Clave foránea a service_categories
            $table->foreignId('category_id')->constrained('service_categories')->onDelete('cascade'); 
            
            $table->string('name', 100); 
            $table->decimal('base_price', 8, 2); 
            $table->unsignedSmallInteger('duration_minutes');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
