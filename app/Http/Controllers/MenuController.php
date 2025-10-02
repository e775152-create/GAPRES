<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-menus|crear-menus|editar-menus|borrar-menus', ['only' => ['index']]);
         $this->middleware('permission:crear-menus', ['only' => ['create','store']]);
         $this->middleware('permission:editar-menus', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-menus', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos las lineas de aportes
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Crear un nueva Menu en la base de datos
        Menu::create($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Menu creado correctamente.');

        return redirect()->route('menus.index')
                         ->with('success', 'Menu creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener la Menu por su ID
        $menus = Menu::findOrFail($id);

        return view('menus.show', compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener la Menu por su ID
        $menus = Menu::findOrFail($id);
        return view('menus.edit', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la entrada de datos
        $this->validateRequest($request);

        // Actualizar Menu en la base de datos
        $menus = Menu::findOrFail($id);
        $menus->update($request->all());
        // Mensaje de éxito
        session()->flash('success', 'Menu actualizado correctamente.');

        return redirect()->route('menus.index')
                         ->with('success', 'Menu actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Menu de la base de datos
        $menus = Menu::findOrFail($id);
        $menus->delete();

        return redirect()->route('menus.index')
                         ->with('success', 'Menu eliminado exitosamente');
    }

    /**
     * Método privado para validar el request.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:80',
            'precio' => 'required|string|max:80',
            'estado' => 'nullable|string|max:20',
            'categoria' => 'required|string|max:80',
        ]);
    }
}