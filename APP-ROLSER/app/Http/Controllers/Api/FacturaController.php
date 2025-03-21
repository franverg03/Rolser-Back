<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    // Obtener todas las facturas
    public function index()
    {
        return response()->json(Factura::with(['pedido', 'clienteNoVip', 'clienteVip', 'comercial'])->get(), 200);
    }

    // Obtener una factura por ID
    public function show($id)
    {
        $factura = Factura::with(['pedido', 'clienteNoVip', 'clienteVip', 'comercial'])->whereId($id);

        return response()->json($factura, 200);
    }

    // Crear una nueva factura
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'factura_importe_total' => 'required|numeric|min:0',
            'id_pedido' => 'required|exists:pedidos,id_pedido',
            'id_cliente_no_vip' => 'nullable|exists:clientes_no_vip,id_cliente_no_vip',
            'id_cliente_vip' => 'nullable|exists:clientes_vip,id_cliente_vip',
            'id_comercial' => 'nullable|exists:comerciales,id_comercial',
        ]);

        $factura = Factura::create($validatedData);

        return response()->json($factura, 201);
    }

    // Actualizar una factura
    public function update(Request $request, $id)
    {
        $factura = Factura::whereId($id);
        if (!$factura) {
            return response()->json(['message' => 'Factura no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'factura_importe_total' => 'sometimes|required|numeric|min:0',
            'id_pedido' => 'sometimes|required|exists:pedidos,id_pedido',
            'id_cliente_no_vip' => 'sometimes|nullable|exists:clientes_no_vip,id_cliente_no_vip',
            'id_cliente_vip' => 'sometimes|nullable|exists:clientes_vip,id_cliente_vip',
            'id_comercial' => 'sometimes|nullable|exists:comerciales,id_comercial',
        ]);

        $factura->update($validatedData);

        return response()->json($factura, 200);
    }

    // Eliminar una factura
    public function destroy($id)
    {
        $factura = Factura::whereId($id);

        $factura->delete();

        return response()->json(['message' => 'Factura eliminada'], 200);
    }


    public function getFacturasPorIdPedido($idPedido)
    {
        $facturas = Factura::where('id_pedido', $idPedido)->get();
        return response()->json($facturas);
    }
}
