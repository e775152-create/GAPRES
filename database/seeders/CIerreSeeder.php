<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cierre;

class CierreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        cierre::create([
            'nombre'=>'Almuerzo',
            'estado'=>'Activo'
        ]);
        cierre::create([
            'nombre'=>'Gasolina',
            'estado'=>'Activo',
        ]);
        cierre::create([
            'nombre'=>'Billete falso',
            'estado'=>'Activo',
        ]);
        cierre::create([
            'nombre'=>'Domicilio',
            'estado'=>'Activo',
        ]);
    }
}
