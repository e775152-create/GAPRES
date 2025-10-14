<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-proveedores|crear-proveedores|editar-proveedores|borrar-proveedores', ['only' => ['index']]);
         $this->middleware('permission:crear-proveedores', ['only' => ['create','store']]);
         $this->middleware('permission:editar-proveedores', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-proveedores', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las lineas de aportes
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'nit' => 'nullable|string|max:50',
        'telefono' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:100',
        'direccion' => 'nullable|string|max:255',
    ]);

    Proveedor::create($request->all());

    return redirect()->route('proveedores.index')->with('success', 'Proveedor agregado correctamente');
}


    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $proveedor = Proveedor::findOrFail($id); // Trae el proveedor o da error 404
    return view('proveedores.show', compact('proveedor')); // Pasa la variable a la vista
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Proveedor por su ID
        $proveedores = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la proveedore de datos
        $this->validateRequest($request);

        // Actualizar Proveedor en la base de datos
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Proveedor actualizado correctamente.');

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Proveedor de la base de datos
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor eliminado exitosamente');
    }

    /**
     * Método privado para validar el request.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'nit' => 'nullable|string|max:50',
        'telefono' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:100',
        'direccion' => 'nullable|string|max:255',
        ]);
    }
}