<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entrada;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        entrada::create([
            'nombre'=>'Almuerzo',
            'estado'=>'Activo'
        ]);
        entrada::create([
            'nombre'=>'Gasolina',
            'estado'=>'Activo',
        ]);
        entrada::create([
            'nombre'=>'Billete falso',
            'estado'=>'Activo',
        ]);
        entrada::create([
            'nombre'=>'Domicilio',
            'estado'=>'Activo',
        ]);
    }
}
