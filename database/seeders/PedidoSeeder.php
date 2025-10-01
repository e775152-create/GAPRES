<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\DetallePedido;

class PedidoSeeder extends Seeder
{
    public function run(): void
    {
        $pedido = Pedido::create([
            'num_mesa' => 1,
            'total' => 50.00,
            'estado' => 'PENDIENTE',
            'id_usuario' => 1,
        ]);

        DetallePedido::create([
            'id_pedido' => $pedido->id,
            'nombre' => 'Hamburguesa',
            'precio' => 25.00,
            'cantidad' => 1,
        ]);

        DetallePedido::create([
            'id_pedido' => $pedido->id,
            'nombre' => 'Gaseosa',
            'precio' => 25.00,
            'cantidad' => 1,
        ]);
    }
}
