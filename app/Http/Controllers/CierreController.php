<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cierre;
use Illuminate\Support\Facades\Auth;

class CierreController extends Controller
{
    public function index()
    {
        $fecha = date('Y-m-d');

        // Buscar cierre del día (si ya existe)
        $cierre = Cierre::where('fecha', $fecha)->first();

        // Pedidos del día
        $pedidos = Pedido::whereDate('created_at', $fecha)->get();

        // Totales
        $totalEfectivo = $pedidos->where('metodo_pago', 'efectivo')->sum('total');
        $totalTarjeta  = $pedidos->where('metodo_pago', 'tarjeta')->sum('total');
        $totalGeneral  = $pedidos->sum('total');

        return view('cierres.index', compact(
            'cierre',
            'pedidos',
            'totalEfectivo',
            'totalTarjeta',
            'totalGeneral'
        ));
    }

    public function cerrarDia(Request $request)
    {
        $fecha = date('Y-m-d');

        // Evitar duplicados
        $existe = Cierre::where('fecha', $fecha)->first();
        if ($existe) {
            return redirect()->back()->with('error', 'El cierre del día ya se ha realizado.');
        }

        $pedidos = Pedido::whereDate('created_at', $fecha)->get();

        $totalEfectivo = $pedidos->where('metodo_pago', 'efectivo')->sum('total');
        $totalTarjeta  = $pedidos->where('metodo_pago', 'tarjeta')->sum('total');
        $totalGeneral  = $pedidos->sum('total');

        Cierre::create([
            'fecha' => $fecha,
            'total_efectivo' => $totalEfectivo,
            'total_tarjeta' => $totalTarjeta,
            'total_general' => $totalGeneral,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Cierre realizado correctamente.');
    }
    public function activarCuadre()
{
    $fecha = date('Y-m-d');

    // Eliminamos el cierre del día actual si existe (para "reactivarlo")
    $cierre = \App\Models\Cierre::where('fecha', $fecha)->first();

    if (!$cierre) {
        return redirect()->back()->with('error', 'No existe un cierre previo para reactivar.');
    }

    $cierre->delete();

    return redirect()->back()->with('success', 'El cuadre ha sido activado. Ya puedes registrar nuevos pedidos.');
}

}
