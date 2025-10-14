<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Proveedor;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-entradas|crear-entradas|editar-entradas|borrar-entradas', ['only' => ['index']]);
        $this->middleware('permission:crear-entradas', ['only' => ['create','store']]);
        $this->middleware('permission:editar-entradas', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-entradas', ['only' => ['destroy']]);
    }

    public function index()
    {
        $entradas = Entrada::with(['proveedor','empleado'])->get();
        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $empleados = Empleado::all();
        return view('entradas.create', compact('proveedores', 'empleados'));
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        Entrada::create($request->all());
        return redirect()->route('entradas.index')->with('success', 'Entrada registrada correctamente.');
    }

    public function show($id)
    {
        $entrada = Entrada::with(['proveedor','empleado'])->findOrFail($id);
        return view('entradas.show', compact('entrada'));
    }

    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        $proveedores = Proveedor::all();
        $empleados = Empleado::all();
        return view('entradas.edit', compact('entrada', 'proveedores', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        $entrada = Entrada::findOrFail($id);
        $entrada->update($request->all());
        return redirect()->route('entradas.index')->with('success', 'Entrada actualizada correctamente.');
    }

    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();
        return redirect()->route('entradas.index')->with('success', 'Entrada eliminada correctamente.');
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'proveedor_id' => 'nullable|integer|exists:proveedores,id',
            'empleado_id' => 'nullable|integer|exists:empleados,id',
            'descripcion' => 'nullable|string|max:255',
            'total' => 'nullable|numeric|min:0',
            'estado' => 'nullable|string|max:20',
        ]);
    }
}
