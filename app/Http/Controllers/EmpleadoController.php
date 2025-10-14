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

    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente');
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente');
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:80',
            'documento' => 'nullable|string|max:30',
            'cargo' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'telefono' => 'nullable|string|max:30',
            'direccion' => 'nullable|string|max:150',
            'estado' => 'required|string|max:20',
        ]);
    }
}
