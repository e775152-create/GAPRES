<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        proveedor::create([
            'nombre'=>'Almuerzo',
            'estado'=>'Activo'
        ]);
        proveedor::create([
            'nombre'=>'Gasolina',
            'estado'=>'Activo',
        ]);
        proveedor::create([
            'nombre'=>'Billete falso',
            'estado'=>'Activo',
        ]);
        proveedor::create([
            'nombre'=>'Domicilio',
            'estado'=>'Activo',
        ]);
    }
}
