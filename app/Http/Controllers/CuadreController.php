<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Carbon\Carbon;

class CuadreController extends Controller
{
    public function index(Request $request)
    {
        $hoy = Carbon::today();

        // Resumen del día
        $pedidosHoy = Pedido::whereDate('created_at', $hoy)->get();
        $totalHoy = $pedidosHoy->sum('total');
        $efectivoHoy = $pedidosHoy->where('metodo_pago', 'efectivo')->sum('total');
        $tarjetaHoy = $pedidosHoy->where('metodo_pago', 'tarjeta')->sum('total');

        // Rango de fechas para el histórico
        $desde = $request->input('desde', Carbon::today()->subDays(7)->format('Y-m-d'));
        $hasta = $request->input('hasta', Carbon::today()->format('Y-m-d'));

        $historial = Pedido::whereBetween('fecha', [$desde, $hasta])
                ->selectRaw('fecha as fecha, 
                 SUM(total) as total,
                 SUM(CASE WHEN metodo_pago = "efectivo" THEN total ELSE 0 END) as efectivo,
                 SUM(CASE WHEN metodo_pago = "tarjeta" THEN total ELSE 0 END) as tarjeta')
                ->groupBy('fecha')
                ->orderBy('fecha', 'desc')
                ->get();


        return view('cuadre.index', compact(
            'totalHoy', 'efectivoHoy', 'tarjetaHoy',
            'historial', 'desde', 'hasta'
        ));
    }
}
