<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'monto',
        'fecha_pago',
        'tipo_pago',
        'observacion',
        'estado',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
