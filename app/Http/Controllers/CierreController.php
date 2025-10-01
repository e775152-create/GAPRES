<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cierre;

class CierreController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-cierres|crear-cierres|editar-cierres|borrar-cierres', ['only' => ['index']]);
         $this->middleware('permission:crear-cierres', ['only' => ['create','store']]);
         $this->middleware('permission:editar-cierres', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-cierres', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las lineas de aportes
        $cierres = Cierre::all();
        return view('cierres.index', compact('cierres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cierres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Crear un nueva Cierre en la base de datos
        Cierre::create($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Cierre creado correctamente.');

        return redirect()->route('cierres.index')
                         ->with('success', 'Cierre creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la Cierre por su ID
        $cierres = Cierre::findOrFail($id);

        return view('cierres.show', compact('cierres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Cierre por su ID
        $cierres = Cierre::findOrFail($id);
        return view('cierres.edit', compact('cierres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Actualizar Cierre en la base de datos
        $cierres = Cierre::findOrFail($id);
        $cierres->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Cierre actualizado correctamente.');

        return redirect()->route('cierres.index')
                         ->with('success', 'Cierre actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Cierre de la base de datos
        $cierres = Cierre::findOrFail($id);
        $cierres->delete();

        return redirect()->route('cierres.index')
                         ->with('success', 'Cierre eliminado exitosamente');
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