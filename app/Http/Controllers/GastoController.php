<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Empleado;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-gastos|crear-gastos|editar-gastos|borrar-gastos', ['only' => ['index']]);
        $this->middleware('permission:crear-gastos', ['only' => ['create','store']]);
        $this->middleware('permission:editar-gastos', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-gastos', ['only' => ['destroy']]);
    }

    public function index()
    {
        $gastos = Gasto::with('empleado')->get();
        return view('gastos.index', compact('gastos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('gastos.create', compact('empleados'));
    }

    public function store(Request $request)
{
    $request->validate([
        'descripcion' => 'required|string|max:255',
        'monto' => 'required|numeric|min:0',
        'fecha' => 'required|date',
        'categoria' => 'nullable|string|max:100',
        'empleado_id' => 'nullable|exists:empleados,id',
    ]);

    Gasto::create([
        'descripcion' => $request->descripcion,
        'monto' => $request->monto,
        'fecha' => $request->fecha,
        'categoria' => $request->categoria,
        'empleado_id' => $request->empleado_id,
    ]);

    return redirect()->route('gastos.index')->with('success', 'Gasto registrado correctamente');
}


    public function show($id)
    {
        $gasto = Gasto::with('empleado')->findOrFail($id);
        return view('gastos.show', compact('gasto'));
    }

    public function edit($id)
    {
        $gasto = Gasto::findOrFail($id);
        $empleados = Empleado::all();
        return view('gastos.edit', compact('gasto', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        $gasto = Gasto::findOrFail($id);
        $gasto->update($request->all());

        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $gasto = Gasto::findOrFail($id);
        $gasto->delete();

        return redirect()->route('gastos.index')->with('success', 'Gasto eliminado correctamente.');
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'concepto' => 'required|string|max:100',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'categoria' => 'nullable|string|max:50',
            'metodo_pago' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string|max:255',
            'empleado_id' => 'nullable|exists:empleados,id',
        ]);
    }
}
