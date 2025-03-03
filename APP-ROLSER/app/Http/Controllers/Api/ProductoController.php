<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        return response()->json(Producto::with('almacen')->get(), 200);
    }

    // Obtener un producto por ID
    public function show($id)
    {
        // $producto = Producto::with('almacen')->whereId($id);

        // return response()->json($producto, 200);

        $producto = Producto::findOrFail($id);
        return $producto;
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'producto_nombre' => 'required|string|max:100',
            'producto_descripcion' => 'required|string',
            'producto_tipo' => 'required|string|max:50',
            'producto_numero_lote' => 'required|string|max:50',
            'producto_codigo' => 'required|string|max:50|unique:productos,producto_codigo',
            'producto_precio' => 'required|numeric|min:0',
            'producto_stock' => 'required|integer|min:0',
            'producto_colores' => 'required|string',
            'id_almacen' => 'nullable|exists:almacenes,id_almacen',
            'producto_ruta_imagen' => 'required|string|max:255',
        ]);

        $producto = Producto::create($validatedData);

        return response()->json($producto, 201);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $producto = Producto::whereId($id);

        $validatedData = $request->validate([
            'producto_nombre' => 'sometimes|required|string|max:100',
            'producto_descripcion' => 'sometimes|required|string',
            'producto_tipo' => 'sometimes|required|string|max:50',
            'producto_numero_lote' => 'sometimes|required|string|max:50',
            'producto_codigo' => 'sometimes|required|string|max:50|unique:productos,producto_codigo,' . $id . ',id_producto',
            'producto_precio' => 'sometimes|required|numeric|min:0',
            'producto_stock' => 'sometimes|required|integer|min:0',
            'producto_colores' => 'sometimes|required|string',
            'id_almacen' => 'sometimes|nullable|exists:almacenes,id_almacen',
            'producto_ruta_imagen' => 'required|string|max:255',
        ]);

        $producto->update($validatedData);

        return response()->json($producto, 200);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::whereId($id);

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado'], 200);
    }
}
