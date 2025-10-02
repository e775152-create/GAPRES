<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // HAMBURGUESAS
        Menu::create(['nombre' => 'Hamburguesa economica',
                                  'precio' => 6000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa sencilla',
                                  'precio' => 8000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa de pollo',
                                  'precio' => 9500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa milanesa de pollo',
                                  'precio' => 9500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa doble carne',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa mixta',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa especial',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa ranchera',
                                  'precio' => 11500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);
        Menu::create(['nombre' => 'Hamburguesa ranchera con milanesa',
                                  'precio' => 14000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Hamburguesas']);

        // SANDWICHES
        Menu::create(['nombre' => 'Sandwiche sencillo',
                                  'precio' => 6000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Sandwiches']);
        Menu::create(['nombre' => 'Sandwiche mixto',
                                  'precio' => 9000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Sandwiches']);
        Menu::create(['nombre' => 'Sandwiche mixto grande',
                                  'precio' => 12000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Sandwiches']);
        Menu::create(['nombre' => 'Sandwiche mixto extragrande',
                                  'precio' => 15000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Sandwiches']);
        Menu::create(['nombre' => 'Sandwiche medio cubano',
                                  'precio' => 6000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Sandwiches']);
        Menu::create(['nombre' => 'Sandwiche cubano',
                                  'precio' => 11000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Sandwiches']);

        // PERROS CALIENTES
        Menu::create(['nombre' => 'Perro caliente mediano',
                                  'precio' => 6000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Perros calientes']);
        Menu::create(['nombre' => 'Perro caliente grande',
                                  'precio' => 8000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Perros calientes']);
        Menu::create(['nombre' => 'Perro caliente americano',
                                  'precio' => 9500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Perros calientes']);
        Menu::create(['nombre' => 'Perro caliente ranchero',
                                  'precio' => 9500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Perros calientes']);
        Menu::create(['nombre' => 'Perro caliente mixto',
                                  'precio' => 9500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Perros calientes']);
        Menu::create(['nombre' => 'Perro caliente loco',
                                  'precio' => 11000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Perros calientes']);

        // ALITAS
        Menu::create(['nombre' => 'Alitas a la BBQ personal',
                                  'precio' => 13000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Alitas']);
        Menu::create(['nombre' => 'Alitas a la BBQ mediana',
                                  'precio' => 18000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Alitas']);
        Menu::create(['nombre' => 'Alitas a la BBQ grande',
                                  'precio' => 28000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Alitas']);

        // PINCHOS
        Menu::create(['nombre' => 'Pinchos de carne',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pinchos']);
        Menu::create(['nombre' => 'Pinchos de pollo',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pinchos']);
        Menu::create(['nombre' => 'Pinchos de lomo de cerdo',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pinchos']);
        Menu::create(['nombre' => 'Pinchos mixtos',
                                  'precio' => 12000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pinchos']);

        // PICADAS
        Menu::create(['nombre' => 'Picadas mixtas personal',
                                  'precio' => 14000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Picadas']);
        Menu::create(['nombre' => 'Picadas mixtas mediana',
                                  'precio' => 18000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Picadas']);
        Menu::create(['nombre' => 'Picadas mixtas grande',
                                  'precio' => 25000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Picadas']);
        Menu::create(['nombre' => 'Picadas mixtas familiar',
                                  'precio' => 33000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Picadas']);

        // SALCHIPAPAS
        Menu::create(['nombre' => 'Salchipapa personal',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Salchipapas']);
        Menu::create(['nombre' => 'Salchipapa mediana',
                                  'precio' => 14000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Salchipapas']);
        Menu::create(['nombre' => 'Salchipapa grande',
                                  'precio' => 18000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Salchipapas']);
        Menu::create(['nombre' => 'Salchipapa familiar',
                                  'precio' => 25000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Salchipapas']);

        // POLLO BROASTER
        Menu::create(['nombre' => 'Pollo broaster ala',
                                  'precio' => 6000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pollo Broaster']);
        Menu::create(['nombre' => 'Pollo broaster pierna',
                                  'precio' => 6000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pollo Broaster']);
        Menu::create(['nombre' => 'Pollo broaster pechuga',
                                  'precio' => 7000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pollo Broaster']);
        Menu::create(['nombre' => 'Pollo broaster especial',
                                  'precio' => 19000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pollo Broaster']);
        Menu::create(['nombre' => 'Pollo broaster familiar',
                                  'precio' => 38000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pollo Broaster']);
        Menu::create(['nombre' => 'Pollo broaster jumbo',
                                  'precio' => 75000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Pollo Broaster']);

        // ARROCES
        Menu::create(['nombre' => 'Arroz chino personal',
                                  'precio' => 10000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Arroces']);
        Menu::create(['nombre' => 'Arroz chino mediano',
                                  'precio' => 15000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Arroces']);
        Menu::create(['nombre' => 'Arroz chino grande',
                                  'precio' => 18000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Arroces']);
        Menu::create(['nombre' => 'Arroz chino familiar',
                                  'precio' => 24000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Arroces']);

        // BEBIDAS
        Menu::create(['nombre' => 'Gaseosa BEBE',
                                  'precio' => 1500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Bebidas']);
        Menu::create(['nombre' => 'Gaseosa 350ml',
                                  'precio' => 2500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Bebidas']);
        Menu::create(['nombre' => 'Gaseosa 1.5ml CocaCola',
                                  'precio' => 7500,
                                  'estado' => 'Activo',
                                  'categoria' => 'Bebidas']);
        Menu::create(['nombre' => 'Agua en botella 500ml',
                                  'precio' => 2000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Bebidas']);
        Menu::create(['nombre' => 'Cerveza en lata',
                                  'precio' => 4000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Bebidas']);
        Menu::create(['nombre' => 'Jugos naturales',
                                  'precio' => 5000,
                                  'estado' => 'Activo',
                                  'categoria' => 'Bebidas']);
    }
}
