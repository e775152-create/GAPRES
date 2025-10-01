<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuadre;

class CuadreController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-cuadres|crear-cuadres|editar-cuadres|borrar-cuadres', ['only' => ['index']]);
         $this->middleware('permission:crear-cuadres', ['only' => ['create','store']]);
         $this->middleware('permission:editar-cuadres', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-cuadres', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las lineas de aportes
        $cuadres = Cuadre::all();
        return view('cuadres.index', compact('cuadres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cuadres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Crear un nueva Cuadre en la base de datos
        Cuadre::create($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Cuadre creado correctamente.');

        return redirect()->route('cuadres.index')
                         ->with('success', 'Cuadre creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la Cuadre por su ID
        $cuadres = Cuadre::findOrFail($id);

        return view('cuadres.show', compact('cuadres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Cuadre por su ID
        $cuadres = Cuadre::findOrFail($id);
        return view('cuadres.edit', compact('cuadres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Actualizar Cuadre en la base de datos
        $cuadres = Cuadre::findOrFail($id);
        $cuadres->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Cuadre actualizado correctamente.');

        return redirect()->route('cuadres.index')
                         ->with('success', 'Cuadre actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Cuadre de la base de datos
        $cuadres = Cuadre::findOrFail($id);
        $cuadres->delete();

        return redirect()->route('cuadres.index')
                         ->with('success', 'Cuadre eliminado exitosamente');
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