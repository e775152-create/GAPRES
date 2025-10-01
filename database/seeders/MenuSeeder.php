<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        menu::create([
    'nombre' => 'Hamburguesa economica',
    'precio' => 6000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa sencilla',
    'precio' => 8000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa de pollo',
    'precio' => 9500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa milanesa de pollo',
    'precio' => 9500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa doble carne',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa mixta',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa especial',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa ranchera',
    'precio' => 11500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Hamburguesa ranchera con milanesa',
    'precio' => 14000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Sandwiche sencillo',
    'precio' => 6000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Sandwiche mixto',
    'precio' => 9000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Sandwiche mixto grande',
    'precio' => 12000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Sandwiche mixto extragrande',
    'precio' => 15000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Sandwiche medio cubano',
    'precio' => 6000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Sandwiche cubano',
    'precio' => 11000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Perro caliente mediano',
    'precio' => 6000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Perro caliente grande',
    'precio' => 8000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Perro caliente americano',
    'precio' => 9500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Perro caliente ranchero',
    'precio' => 9500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Perro caliente mixto',
    'precio' => 9500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Perro caliente loco',
    'precio' => 11000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Alitas a la BBQ personal',
    'precio' => 13000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Alitas a la BBQ mediana',
    'precio' => 18000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Alitas a la BBQ grande',
    'precio' => 28000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pinchos de carne',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pinchos de pollo',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pinchos de lomo de cerdo',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pinchos mixtos',
    'precio' => 12000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Picadas mixtas personal',
    'precio' => 14000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Picadas mixtas mediana',
    'precio' => 18000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Picadas mixtas grande',
    'precio' => 25000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Picadas mixtas familiar',
    'precio' => 33000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Salchipapa personal',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Salchipapa mediana',
    'precio' => 14000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Salchipapa grande',
    'precio' => 18000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Salchipapa familiar',
    'precio' => 25000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => '1/2 porcion papa',
    'precio' => 3000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster ala',
    'precio' => 6000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster pierna',
    'precio' => 6000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster pechuga',
    'precio' => 7000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster ejecutivo pierna',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster especial',
    'precio' => 19000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster super',
    'precio' => 280000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster familiar',
    'precio' => 38000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster jet',
    'precio' => 46000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster superjet',
    'precio' => 55000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Pollo broaster jumbo',
    'precio' => 75000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'porcion de papa',
    'precio' => 5000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Caldo de huevo',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Caldo de costilla',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Caldo mixto',
    'precio' => 11000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Arroz chino personal',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Arroz chino mediano',
    'precio' => 15000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Arroz chino grande',
    'precio' => 18000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Arroz chino familiar',
    'precio' => 24000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Arroz ranchero 350Gr',
    'precio' => 13000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Arroz ranchero 500Gr',
    'precio' => 18000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Arroz ranchero 1.000Kg',
    'precio' => 32000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Bandeja carne asada',
    'precio' => 13000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Bandeja de lomo de cerdo',
    'precio' => 13000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Bandeja pechuga',
    'precio' => 13000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Bandeja parrillada mixta',
    'precio' => 20000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Bandeja con huevos al gusto',
    'precio' => 13000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Adicional de consome',
    'precio' => 3000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Gaseosa BEBE',
    'precio' => 1500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Gaseosa 350ml',
    'precio' => 2500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Gaseosa P-400ml',
    'precio' => 4000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Gaseosa litron',
    'precio' => 4500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Gaseosa 1.5ml CocaCola',
    'precio' => 7500,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Gaseosa 2.5ml CocaCola',
    'precio' => 10000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Agua en botella 500ml',
    'precio' => 2000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Cerveza en lata',
    'precio' => 4000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Jugos naturales',
    'precio' => 5000,
    'estado' => 'Activo'
]);
menu::create([
    'nombre' => 'Jugos (Jarra)',
    'precio' => 10000,
    'estado' => 'Activo'
]);
    }
}
