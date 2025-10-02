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

    // Relación con productos (Menu)
    public function productos()
    {
        return $this->belongsToMany(Menu::class, 'pedido_producto') // tabla pivot
                    ->withPivot('cantidad'); // cantidad de cada producto
    }

    // Relación con usuario (opcional)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
