<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $table = 'gastos';

    protected $fillable = [
        'concepto',
        'monto',
        'fecha',
        'categoria',
        'metodo_pago',
        'descripcion',
        'empleado_id',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
