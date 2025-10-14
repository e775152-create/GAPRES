<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Empleado;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('empleado')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('pagos.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'nullable|exists:empleados,id',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'tipo_pago' => 'nullable|string',
            'observacion' => 'nullable|string',
        ]);

        Pago::create($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente.');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado.');
    }
}
