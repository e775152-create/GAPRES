<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cierre extends Model
{
    use HasFactory;

    protected $table = 'cierres'; // tu tabla exacta

    protected $fillable = [
        'fecha',
        'total_efectivo',
        'total_tarjeta',
        'total_general',
        'user_id'
    ];
}
