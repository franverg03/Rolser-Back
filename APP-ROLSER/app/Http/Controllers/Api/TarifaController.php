<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    // Obtener todas las tarifas
    public function index()
    {
        return response()->json(Tarifa::all(), 200);
    }

    // Obtener una tarifa por ID
    public function show($id)
    {
        $tarifa = Tarifa::find($id);
        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa no encontrada'], 404);
        }
        return response()->json($tarifa, 200);
    }

    // Crear una nueva tarifa
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion_tarifa' => 'required|string|max:255',
            'porcentaje_tarifa' => 'required|numeric|min:0|max:100',
            'beneficiario_tarifa' => 'required|string|max:100',
        ]);

        $tarifa = Tarifa::create($validatedData);

        return response()->json($tarifa, 201);
    }

    // Actualizar una tarifa
    public function update(Request $request, $id)
    {
        $tarifa = Tarifa::find($id);
        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'descripcion_tarifa' => 'sometimes|required|string|max:255',
            'porcentaje_tarifa' => 'sometimes|required|numeric|min:0|max:100',
            'beneficiario_tarifa' => 'sometimes|required|string|max:100',
        ]);

        $tarifa->update($validatedData);

        return response()->json($tarifa, 200);
    }

    // Eliminar una tarifa
    public function destroy($id)
    {
        $tarifa = Tarifa::find($id);
        if (!$tarifa) {
            return response()->json(['message' => 'Tarifa no encontrada'], 404);
        }

        $tarifa->delete();

        return response()->json(['message' => 'Tarifa eliminada'], 200);
    }
}
