<?php

namespace App\Http\Controllers;

use App\Models\LineaPedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class LineaPedidoController extends Controller
{
    // Obtener todas las líneas de pedidos
    public function index()
    {
        return response()->json(LineaPedido::with(['pedido', 'producto'])->get(), 200);
    }

    // Obtener una línea de pedido por ID
    public function show($id)
    {
        $lineaPedido = LineaPedido::with(['pedido', 'producto'])->find($id);
        if (!$lineaPedido) {
            return response()->json(['message' => 'Línea de pedido no encontrada'], 404);
        }
        return response()->json($lineaPedido, 200);
    }

    // Crear una nueva línea de pedido
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'linea_cantidad' => 'required|integer|min:1',
            'id_pedido' => 'required|exists:pedidos,id_pedido',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        // Obtener el producto para calcular el precio total
        $producto = Producto::find($validatedData['id_producto']);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Calcular el precio total
        $validatedData['linea_precio_total'] = $producto->producto_precio * $validatedData['linea_cantidad'];

        // Crear la línea de pedido
        $lineaPedido = LineaPedido::create($validatedData);

        return response()->json($lineaPedido, 201);
    }

    // Actualizar una línea de pedido
    public function update(Request $request, $id)
    {
        $lineaPedido = LineaPedido::find($id);
        if (!$lineaPedido) {
            return response()->json(['message' => 'Línea de pedido no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'linea_cantidad' => 'sometimes|required|integer|min:1',
            'id_pedido' => 'sometimes|required|exists:pedidos,id_pedido',
            'id_producto' => 'sometimes|required|exists:productos,id_producto',
        ]);

        // Si se cambia la cantidad o el producto, recalcular el precio total
        if (isset($validatedData['linea_cantidad']) || isset($validatedData['id_producto'])) {
            $producto = Producto::find($validatedData['id_producto'] ?? $lineaPedido->id_producto);
            if (!$producto) {
                return response()->json(['message' => 'Producto no encontrado'], 404);
            }

            $cantidad = $validatedData['linea_cantidad'] ?? $lineaPedido->linea_cantidad;
            $validatedData['linea_precio_total'] = $producto->producto_precio * $cantidad;
        }

        $lineaPedido->update($validatedData);

        return response()->json($lineaPedido, 200);
    }

    // Eliminar una línea de pedido
    public function destroy($id)
    {
        $lineaPedido = LineaPedido::find($id);
        if (!$lineaPedido) {
            return response()->json(['message' => 'Línea de pedido no encontrada'], 404);
        }

        $lineaPedido->delete();

        return response()->json(['message' => 'Línea de pedido eliminada'], 200);
    }
}
