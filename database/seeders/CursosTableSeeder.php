<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            [
                'codigo' => 'CS101',
                'nombre' => 'Introducción a la Programación',
                'numero_creditos' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'CS102',
                'nombre' => 'Estructuras de Datos',
                'numero_creditos' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'CS103',
                'nombre' => 'Bases de Datos',
                'numero_creditos' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

