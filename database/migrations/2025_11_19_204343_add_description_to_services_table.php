<?php
// ...
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Añadimos la columna 'description' como texto largo y permitiendo valores nulos (nullable)
            $table->text('description')->nullable()->after('duration_minutes');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Al revertir, eliminamos la columna
            $table->dropColumn('description');
        });
    }
};