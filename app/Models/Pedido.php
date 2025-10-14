<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_mesa',
        'fecha',
        'id_usuario',
        'total',
        'estado',
        'observaciones'
    ];

    // Relación con DetallePedido
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }

    // Relación con productos (Menu)
    public function productos()
    {
        return $this->belongsToMany(Menu::class, 'detalle_pedidos', 'id_pedido', 'id_producto')
                    ->withPivot('nombre', 'precio', 'cantidad', 'subtotal')
                    ->withTimestamps();
    }

    // Relación con usuario (opcional)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
