<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    // Obtener todos los seguimientos
    public function index()
    {
        return response()->json(Seguimiento::with('pedido')->get(), 200);
    }

    // Obtener un seguimiento por ID
    public function show($id)
    {
        $seguimiento = Seguimiento::with('pedido')->find($id);
        if (!$seguimiento) {
            return response()->json(['message' => 'Seguimiento no encontrado'], 404);
        }
        return response()->json($seguimiento, 200);
    }

    // Crear un nuevo seguimiento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pedido' => 'required|exists:pedidos,id_pedido',
            'seguimiento_descripcion' => 'nullable|string',
            'seguimiento_fecha' => 'required|date',
        ]);

        $seguimiento = Seguimiento::create($validatedData);

        return response()->json($seguimiento, 201);
    }

    // Actualizar un seguimiento
    public function update(Request $request, $id)
    {
        $seguimiento = Seguimiento::find($id);
        if (!$seguimiento) {
            return response()->json(['message' => 'Seguimiento no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'id_pedido' => 'sometimes|required|exists:pedidos,id_pedido',
            'seguimiento_descripcion' => 'sometimes|nullable|string',
            'seguimiento_fecha' => 'sometimes|required|date',
        ]);

        $seguimiento->update($validatedData);

        return response()->json($seguimiento, 200);
    }

    // Eliminar un seguimiento
    public function destroy($id)
    {
        $seguimiento = Seguimiento::find($id);
        if (!$seguimiento) {
            return response()->json(['message' => 'Seguimiento no encontrado'], 404);
        }

        $seguimiento->delete();

        return response()->json(['message' => 'Seguimiento eliminado'], 200);
    }
}
