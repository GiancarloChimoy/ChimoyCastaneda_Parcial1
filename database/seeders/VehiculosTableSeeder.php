<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VehiculosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehiculos')->insert([
            'placa' => 'ABC123',
            'modelo' => 'Toyota Corolla',
            'propietario' => 'Juan Perez',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
