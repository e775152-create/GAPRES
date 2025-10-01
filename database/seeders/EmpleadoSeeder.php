<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        empleado::create([
            'nombre'=>'Almuerzo',
            'estado'=>'Activo'
        ]);
        empleado::create([
            'nombre'=>'Gasolina',
            'estado'=>'Activo',
        ]);
        empleado::create([
            'nombre'=>'Billete falso',
            'estado'=>'Activo',
        ]);
        empleado::create([
            'nombre'=>'Domicilio',
            'estado'=>'Activo',
        ]);
    }
}
