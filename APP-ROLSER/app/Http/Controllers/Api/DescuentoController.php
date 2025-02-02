<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use Illuminate\Http\Request;

class DescuentoController extends Controller
{
    // Obtener todos los descuentos
    public function index()
    {
        return response()->json(Descuento::with(['clienteVip', 'clienteNoVip'])->get(), 200);
    }

    // Obtener un descuento por ID
    public function show($id)
    {
        $descuento = Descuento::with(['clienteVip', 'clienteNoVip'])->find($id);
        if (!$descuento) {
            return response()->json(['message' => 'Descuento no encontrado'], 404);
        }
        return response()->json($descuento, 200);
    }

    // Crear un nuevo descuento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion_descuento' => 'required|string|max:255',
            'porcentaje_descuento' => 'required|string|max:5',
            'fechaInicio_descuento' => 'required|date',
            'fechaFin_descuento' => 'required|date|after_or_equal:fechaInicio_descuento',
            'id_cliente_vip' => 'nullable|exists:clientes_vip,id_cliente_vip',
            'id_cliente_no_vip' => 'nullable|exists:clientes_no_vip,id_cliente_no_vip',
        ]);

        // Validar que al menos un cliente esté presente
        if (!$request->id_cliente_vip && !$request->id_cliente_no_vip) {
            return response()->json(['message' => 'Debe asignarse un cliente VIP o No VIP al descuento.'], 400);
        }

        $descuento = Descuento::create($validatedData);

        return response()->json($descuento, 201);
    }

    // Actualizar un descuento
    public function update(Request $request, $id)
    {
        $descuento = Descuento::find($id);
        if (!$descuento) {
            return response()->json(['message' => 'Descuento no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'descripcion_descuento' => 'sometimes|required|string|max:255',
            'porcentaje_descuento' => 'sometimes|required|string|max:5',
            'fechaInicio_descuento' => 'sometimes|required|date',
            'fechaFin_descuento' => 'sometimes|required|date|after_or_equal:fechaInicio_descuento',
            'id_cliente_vip' => 'sometimes|nullable|exists:clientes_vip,id_cliente_vip',
            'id_cliente_no_vip' => 'sometimes|nullable|exists:clientes_no_vip,id_cliente_no_vip',
        ]);

        // Validar que al menos un cliente esté presente
        if (!$request->id_cliente_vip && !$request->id_cliente_no_vip) {
            return response()->json(['message' => 'Debe asignarse un cliente VIP o No VIP al descuento.'], 400);
        }

        $descuento->update($validatedData);

        return response()->json($descuento, 200);
    }

    // Eliminar un descuento
    public function destroy($id)
    {
        $descuento = Descuento::find($id);
        if (!$descuento) {
            return response()->json(['message' => 'Descuento no encontrado'], 404);
        }

        $descuento->delete();

        return response()->json(['message' => 'Descuento eliminado'], 200);
    }
}
