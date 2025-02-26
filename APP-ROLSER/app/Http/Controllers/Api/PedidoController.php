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
        $pedido = Pedido::with(['clienteVip', 'clienteNoVip'])->whereId($id);

        return response()->json($pedido, 200);
    }

    // Crear un nuevo pedido
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pedido_estado' => 'required|string|max:50',
            'fecha_creacion' => 'required|date',
            'codigo_Pedido' => 'required|max:255',
            'total_Pedido' => 'required',
            'id_cliente_vip' => 'nullable|exists:clientes_vip,id_cliente_vip',
            'id_cliente_no_vip' => 'nullable|exists:clientes_no_vip,id_cliente_no_vip',
        ]);

        $pedido = Pedido::create($validatedData);

        return response()->json($pedido, 201);
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
        $pedido = Pedido::whereId($id);

        $validatedData = $request->validate([
            'pedido_estado' => 'sometimes|required|string|max:50',
            'fecha_creacion' => 'sometimes|required|date',
            'codigo_Pedido' => 'sometimes|required|max:255',
            'total_Pedido' => 'sometimes|required',
            'id_cliente_vip' => 'sometimes|nullable|exists:clientes_vip,id_cliente_vip',
            'id_cliente_no_vip' => 'sometimes|nullable|exists:clientes_no_vip,id_cliente_no_vip',
        ]);


        $pedido->update($validatedData);

        return response()->json($pedido, 200);
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $pedido = Pedido::whereId($id);

        $pedido->delete();

        return response()->json(['message' => 'Pedido eliminado'], 200);
    }
}
