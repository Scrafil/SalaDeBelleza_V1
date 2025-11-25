<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Añadir columnas temporales para conservar valores actuales
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id_tmp')->nullable()->after('id');
            $table->unsignedBigInteger('employee_id_tmp')->nullable()->after('client_id_tmp');
        });

        // 2) Copiar datos a las columnas temporales
        DB::statement('UPDATE appointments SET client_id_tmp = client_id, employee_id_tmp = employee_id');

        // 3) Eliminar constraints y columnas viejas
        Schema::table('appointments', function (Blueprint $table) {
            // Protegemos por si una FK no existe en algunas bases
            if (Schema::hasColumn('appointments', 'client_id')) {
                try {
                    $table->dropForeign(['client_id']);
                } catch (\Exception $e) {
                    // ignore
                }
            }
            if (Schema::hasColumn('appointments', 'employee_id')) {
                try {
                    $table->dropForeign(['employee_id']);
                } catch (\Exception $e) {
                    // ignore
                }
            }

            // Ahora quitamos las columnas originales
            if (Schema::hasColumn('appointments', 'client_id')) {
                $table->dropColumn('client_id');
            }
            if (Schema::hasColumn('appointments', 'employee_id')) {
                $table->dropColumn('employee_id');
            }
        });

        // 4) Crear las nuevas columnas (nullable) con FK ON DELETE SET NULL
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('client_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('employee_id')->nullable()->constrained('users')->onDelete('set null');
        });

        // 5) Restaurar datos desde las columnas temporales a las nuevas columnas
        DB::statement('UPDATE appointments SET client_id = client_id_tmp, employee_id = employee_id_tmp');

        // 6) Eliminar columnas temporales
        Schema::table('appointments', function (Blueprint $table) {
            if (Schema::hasColumn('appointments', 'client_id_tmp')) {
                $table->dropColumn('client_id_tmp');
            }
            if (Schema::hasColumn('appointments', 'employee_id_tmp')) {
                $table->dropColumn('employee_id_tmp');
            }
        });
    }

    public function down(): void
    {
        // Intento de revertir: volver a columnas no-null con onDelete cascade (no-forzoso)

        // 1) Añadir columnas temporales para guardar datos actuales
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id_old')->nullable()->after('id');
            $table->unsignedBigInteger('employee_id_old')->nullable()->after('client_id_old');
        });

        DB::statement('UPDATE appointments SET client_id_old = client_id, employee_id_old = employee_id');

        // 2) Quitar constraints actuales y columnas
        Schema::table('appointments', function (Blueprint $table) {
            try {
                $table->dropForeign(['client_id']);
            } catch (\Exception $e) {
                // ignore
            }
            try {
                $table->dropForeign(['employee_id']);
            } catch (\Exception $e) {
                // ignore
            }

            if (Schema::hasColumn('appointments', 'client_id')) {
                $table->dropColumn('client_id');
            }
            if (Schema::hasColumn('appointments', 'employee_id')) {
                $table->dropColumn('employee_id');
            }
        });

        // 3) Recrear columnas antiguas (not nullable originally, here we add them nullable to be safe)
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('client_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('employee_id')->nullable()->constrained('users')->onDelete('cascade');
        });

        // 4) Restaurar valores
        DB::statement('UPDATE appointments SET client_id = client_id_old, employee_id = employee_id_old');

        // 5) Eliminar temporales
        Schema::table('appointments', function (Blueprint $table) {
            if (Schema::hasColumn('appointments', 'client_id_old')) {
                $table->dropColumn('client_id_old');
            }
            if (Schema::hasColumn('appointments', 'employee_id_old')) {
                $table->dropColumn('employee_id_old');
            }
        });
    }
};
