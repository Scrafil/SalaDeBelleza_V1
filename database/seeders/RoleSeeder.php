<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'description' => 'Control total del sistema'],
            ['name' => 'Employee', 'description' => 'Trabajador/Estilista, control parcial'],
            ['name' => 'Client', 'description' => 'Cliente que adquiere servicios'],
        ]);
    }
}
