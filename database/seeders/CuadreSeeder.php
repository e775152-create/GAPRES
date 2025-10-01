<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuadre;

class CuadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        cuadre::create([
            'nombre'=>'Almuerzo',
            'estado'=>'Activo'
        ]);
        cuadre::create([
            'nombre'=>'Gasolina',
            'estado'=>'Activo',
        ]);
        cuadre::create([
            'nombre'=>'Billete falso',
            'estado'=>'Activo',
        ]);
        cuadre::create([
            'nombre'=>'Domicilio',
            'estado'=>'Activo',
        ]);
    }
}
