<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class EntradaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-entradas|crear-entradas|editar-entradas|borrar-entradas', ['only' => ['index']]);
         $this->middleware('permission:crear-entradas', ['only' => ['create','store']]);
         $this->middleware('permission:editar-entradas', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-entradas', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las lineas de aportes
        $entradas = Entrada::all();
        return view('entradas.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entradas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Crear un nueva Entrada en la base de datos
        Entrada::create($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Entrada creado correctamente.');

        return redirect()->route('entradas.index')
                         ->with('success', 'Entrada creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la Entrada por su ID
        $entradas = Entrada::findOrFail($id);

        return view('entradas.show', compact('entradas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Entrada por su ID
        $entradas = Entrada::findOrFail($id);
        return view('entradas.edit', compact('entradas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Actualizar Entrada en la base de datos
        $entradas = Entrada::findOrFail($id);
        $entradas->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Entrada actualizado correctamente.');

        return redirect()->route('entradas.index')
                         ->with('success', 'Entrada actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Entrada de la base de datos
        $entradas = Entrada::findOrFail($id);
        $entradas->delete();

        return redirect()->route('entradas.index')
                         ->with('success', 'Entrada eliminado exitosamente');
    }

    /**
     * Método privado para validar el request.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:80',
            'estado' => 'nullable|string|max:20',
        ]);
    }
}