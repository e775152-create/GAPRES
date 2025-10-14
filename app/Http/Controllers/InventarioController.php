<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-inventario|crear-inventario|editar-inventario|borrar-inventario', ['only' => ['index']]);
        $this->middleware('permission:crear-inventario', ['only' => ['create','store']]);
        $this->middleware('permission:editar-inventario', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-inventario', ['only' => ['destroy']]);
    }

    public function index()
    {
        $inventario = Inventario::all();
        return view('inventario.index', compact('inventario'));
    }

    public function create()
    {
        return view('inventario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria' => 'nullable|string|max:50',
            'cantidad' => 'required|integer|min:0',
            'unidad' => 'nullable|string|max:20',
            'precio_unitario' => 'nullable|numeric|min:0',
            'estado' => 'nullable|string|max:20',
        ]);

        Inventario::create($request->all());
        return redirect()->route('inventario.index')->with('success', 'Insumo agregado correctamente.');
    }

    public function show($id)
    {
        $insumo = Inventario::findOrFail($id);
        return view('inventario.show', compact('insumo'));
    }

    public function edit($id)
    {
        $insumo = Inventario::findOrFail($id);
        return view('inventario.edit', compact('insumo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria' => 'nullable|string|max:50',
            'cantidad' => 'required|integer|min:0',
            'unidad' => 'nullable|string|max:20',
            'precio_unitario' => 'nullable|numeric|min:0',
            'estado' => 'nullable|string|max:20',
        ]);

        $insumo = Inventario::findOrFail($id);
        $insumo->update($request->all());

        return redirect()->route('inventario.index')->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $insumo = Inventario::findOrFail($id);
        $insumo->delete();

        return redirect()->route('inventario.index')->with('success', 'Insumo eliminado correctamente.');
    }
}
