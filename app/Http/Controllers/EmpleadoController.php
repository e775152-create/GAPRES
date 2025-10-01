<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-empleados|crear-empleados|editar-empleados|borrar-empleados', ['only' => ['index']]);
         $this->middleware('permission:crear-empleados', ['only' => ['create','store']]);
         $this->middleware('permission:editar-empleados', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-empleados', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las lineas de aportes
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la empleado de datos
        $this->validateRequest($request);

        // Crear un nueva Empleado en la base de datos
        Empleado::create($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Empleado creado correctamente.');

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la Empleado por su ID
        $empleados = Empleado::findOrFail($id);

        return view('empleados.show', compact('empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Empleado por su ID
        $empleados = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la empleado de datos
        $this->validateRequest($request);

        // Actualizar Empleado en la base de datos
        $empleados = Empleado::findOrFail($id);
        $empleados->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Empleado actualizado correctamente.');

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Empleado de la base de datos
        $empleados = Empleado::findOrFail($id);
        $empleados->delete();

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado eliminado exitosamente');
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