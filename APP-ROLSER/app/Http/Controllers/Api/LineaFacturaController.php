<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\LineaFactura;
use App\Models\Producto;
use Illuminate\Http\Request;

class LineaFacturaController extends Controller
{
    // Obtener todas las líneas de facturas
    public function index()
    {
        return response()->json(LineaFactura::with(['factura', 'producto'])->get(), 200);
    }

    // Obtener una línea de factura por ID
    public function show($id)
    {
        $lineaFactura = LineaFactura::with(['factura', 'producto'])->whereId($id);

        return response()->json($lineaFactura, 200);
    }

    // Crear una nueva línea de factura
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unidades' => 'required|integer|min:1',
            'id_factura' => 'required|exists:facturas,id_factura',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        // Obtener el producto para calcular el importe y total
        $producto = Producto::whereId($validatedData['id_producto']);

        // Calcular el importe unitario y el total
        $validatedData['importe'] = $producto->producto_precio;
        $validatedData['total'] = $validatedData['importe'] * $validatedData['unidades'];

        // Crear la línea de factura
        $lineaFactura = LineaFactura::create($validatedData);

        return response()->json($lineaFactura, 201);
    }

    // Actualizar una línea de factura
    public function update(Request $request, $id)
    {
        $lineaFactura = LineaFactura::whereId($id);

        $validatedData = $request->validate([
            'unidades' => 'sometimes|required|integer|min:1',
            'id_factura' => 'sometimes|required|exists:facturas,id_factura',
            'id_producto' => 'sometimes|required|exists:productos,id_producto',
        ]);

        // Si se cambia la cantidad o el producto, recalcular el importe y total
        if (isset($validatedData['unidades']) || isset($validatedData['id_producto'])) {
            $producto = Producto::whereId($validatedData['id_producto'] ?? $lineaFactura->id_producto);

            $unidades = $validatedData['unidades'] ?? $lineaFactura->unidades;
            $validatedData['importe'] = $producto->producto_precio;
            $validatedData['total'] = $validatedData['importe'] * $unidades;
        }

        $lineaFactura->update($validatedData);

        return response()->json($lineaFactura, 200);
    }

    // Eliminar una línea de factura
    public function destroy($id)
    {
        $lineaFactura = LineaFactura::whereId($id);

        $lineaFactura->delete();

        return response()->json(['message' => 'Línea de factura eliminada'], 200);
    }
}
