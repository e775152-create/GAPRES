<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-pedidos|crear-pedidos|editar-pedidos|borrar-pedidos', ['only' => ['index']]);
        $this->middleware('permission:crear-pedidos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-pedidos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-pedidos', ['only' => ['destroy']]);
    }

    /**
     * Mostrar listado de pedidos.
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        $mesas = collect([
            (object)['id' => 1, 'numero' => 1, 'foto' => 'public/vendor/adminlte/dist/img/mesa.jpeg'],
            (object)['id' => 2, 'numero' => 2, 'foto' => 'public/vendor/adminlte/dist/img/mesa.jpeg'],
            (object)['id' => 3, 'numero' => 3, 'foto' => 'public/vendor/adminlte/dist/img/mesa.jpeg'],
            (object)['id' => 4, 'numero' => 4, 'foto' => 'public/vendor/adminlte/dist/img/mesa.jpeg'],
        ]);

        $productos = Menu::where('estado', 'Activo')->get();

        return view('pedidos.create', compact('mesas', 'productos'));
    }

    /**
     * Guardar un nuevo pedido.
     */
    public function store(Request $request)
{
    $request->validate([
        'num_mesa'    => 'required|integer',
        'total'       => 'required|numeric',
        'estado'      => 'required|in:PENDIENTE,FINALIZADO',
        'id_usuario'  => 'required|integer',
        'fecha'       => 'nullable|date', // <--- importante
    ]);

    $pedido = Pedido::create([
        'num_mesa'    => $request->num_mesa,
        'fecha'       => $request->filled('fecha')
                            ? $request->fecha
                            : now()->toDateString(), // <--- si no llega, pone la fecha de hoy
        'total'       => $request->total,
        'observacion' => $request->observacion,
        'estado'      => $request->estado,
        'id_usuario'  => $request->id_usuario,
    ]);

    return redirect()->route('pedidos.index')
        ->with('success', 'Pedido creado correctamente');
}


    /**
     * Mostrar un pedido.
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Actualizar pedido.
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido actualizado correctamente.');
    }

    /**
     * Eliminar pedido.
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido eliminado exitosamente.');
    }

    /**
     * Validación común.
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'num_mesa'   => 'required|integer',
            'fecha'      => 'nullable|date',   // <- antes era required
            'total'      => 'required|numeric|min:0',
            'observacion'=> 'nullable|string|max:255',
            'estado'     => 'required|in:PENDIENTE,FINALIZADO',
            'id_usuario' => 'required|integer',
        ]);
    }
}
