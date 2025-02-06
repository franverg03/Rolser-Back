<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Obtener todos los pedidos
    public function index()
    {
        return response()->json(Pedido::with(['clienteVip', 'clienteNoVip'])->get(), 200);
    }

    // Obtener un pedido por ID
    public function show($id)
    {
        $pedido = Pedido::with(['clienteVip', 'clienteNoVip'])->find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }
        return response()->json($pedido, 200);
    }

    // Crear un nuevo pedido
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pedido_estado' => 'required|string|max:50',
            'fecha_creacion' => 'required|date',
            'id_cliente_vip' => 'nullable|exists:clientes_vip,id_cliente_vip',
            'id_cliente_no_vip' => 'nullable|exists:clientes_no_vip,id_cliente_no_vip',
        ]);

        // Validar que al menos un cliente (VIP o No VIP) esté presente
        if (!$request->id_cliente_vip && !$request->id_cliente_no_vip) {
            return response()->json(['message' => 'Debe asignarse un cliente VIP o No VIP al pedido.'], 400);
        }

        $pedido = Pedido::create($validatedData);

        return response()->json($pedido, 201);
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'pedido_estado' => 'sometimes|required|string|max:50',
            'fecha_creacion' => 'sometimes|required|date',
            'id_cliente_vip' => 'sometimes|nullable|exists:clientes_vip,id_cliente_vip',
            'id_cliente_no_vip' => 'sometimes|nullable|exists:clientes_no_vip,id_cliente_no_vip',
        ]);

        // Validar que al menos un cliente (VIP o No VIP) esté presente
        if (!$request->id_cliente_vip && !$request->id_cliente_no_vip) {
            return response()->json(['message' => 'Debe asignarse un cliente VIP o No VIP al pedido.'], 400);
        }

        $pedido->update($validatedData);

        return response()->json($pedido, 200);
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $pedido->delete();

        return response()->json(['message' => 'Pedido eliminado'], 200);
    }
}
