<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);    
        $this->call(ConfiguracioneSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PedidoSeeder::class);
        
        \App\Models\User::factory()->create([
            'name'=>'Franklin Albeiro Gómez Mendoza',
            'email'=>'fralgom@gmail.com',
            'password'=>bcrypt('Valery0925')
        ])->assignRole('Administrador');

        //$this->call(Linea_AporteSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
