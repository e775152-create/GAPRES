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
    'total',
    'estado',
    'id_usuario',
    ];

    public function pedido()
    {
        return $this->belongsTo(DetallePedido::class, 'id_pedido');
    }
}
