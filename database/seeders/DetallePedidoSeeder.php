<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetallePedido;

class DetallePedidoSeeder extends Seeder
{
    public function run(): void
    {
        DetallePedido::create([
            'pedido_id'   => 1,
            'producto_id' => 1,
            'cantidad'    => 2,
            'precio'      => 15000,
        ]);

        DetallePedido::create([
            'pedido_id'   => 1,
            'producto_id' => 2,
            'cantidad'    => 1,
            'precio'      => 20000,
        ]);

        DetallePedido::create([
            'pedido_id'   => 2,
            'producto_id' => 3,
            'cantidad'    => 3,
            'precio'      => 10000,
        ]);
    }
}
