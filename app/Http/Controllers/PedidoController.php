<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
{
    // Verificar si el día ya está cerrado
    $cierreHoy = \App\Models\Cierre::whereDate('fecha', now()->toDateString())->first();

    if ($cierreHoy) {
        return redirect()->route('pedidos.index')
            ->with('error', 'No puedes crear nuevos pedidos. El cierre diario ya se realizó.');
    }

    // Si no está cerrado, mostrar formulario normalmente
    $mesas = collect([
        (object)['id' => 1, 'numero' => 1],
        (object)['id' => 2, 'numero' => 2],
        (object)['id' => 3, 'numero' => 3],
        (object)['id' => 4, 'numero' => 4],
    ]);

    $productosPorCategoria = Menu::where('estado', 'Activo')
    ->whereNotNull('categoria')
    ->where('categoria', '<>', '')
    ->orderBy('categoria')
    ->get()
    ->groupBy('categoria');

return view('pedidos.create', compact('mesas', 'productosPorCategoria'));

}


    public function store(Request $request)
{
    // Validamos los datos recibidos
    $request->validate([
        'num_mesa' => 'required|integer',
        'total' => 'required|numeric',
        'metodo_pago' => 'required|in:efectivo,tarjeta',
    ]);

    // Creamos el pedido
    $pedido = new Pedido();
    $pedido->num_mesa = $request->num_mesa;
    $pedido->fecha = now();
    $pedido->total = $request->total;
    $pedido->metodo_pago = $request->metodo_pago; // 👈 aquí se guarda lo que venga del select
    $pedido->estado = 'PENDIENTE';
    $pedido->id_usuario = auth()->id() ?? 1;
    $pedido->observaciones = $request->observaciones ?? null;
    $pedido->save();

    // Guardar los productos si los tienes aparte
    if ($request->has('productos')) {
    foreach ($request->productos as $producto) {
        Menu::create([
            'id_pedido' => $pedido->id,
            'id_producto' => $producto['id'] ?? null,
            'cantidad' => $producto['cantidad'] ?? 1,
            'subtotal' => $producto['subtotal'] ?? 0, // 👈 si no existe, le pone 0
        ]);
    }
}


    return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente.');
}


    public function show($id)
    {
        $pedido = Pedido::with('productos')->findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'num_mesa' => 'required|integer',
            'fecha' => 'nullable|date',
            'id_usuario' => 'required|integer',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:PENDIENTE,FINALIZADO',
            'metodo_pago' => 'required|in:efectivo,tarjeta',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy($id)
    {
        Pedido::findOrFail($id)->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
