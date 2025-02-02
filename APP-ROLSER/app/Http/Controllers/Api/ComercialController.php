<?php

namespace App\Http\Controllers;

use App\Models\Comercial;
use Illuminate\Http\Request;

class ComercialController extends Controller
{
    // Obtener todos los comerciales
    public function index()
    {
        return response()->json(Comercial::with('usuario')->get(), 200);
    }

    // Obtener un comercial por ID
    public function show($id)
    {
        $comercial = Comercial::with('usuario')->find($id);
        if (!$comercial) {
            return response()->json(['message' => 'Comercial no encontrado'], 404);
        }
        return response()->json($comercial, 200);
    }

    // Crear un nuevo comercial
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comercial_nombre' => 'required|string|max:100',
            'comercial_apellidos' => 'required|string|max:100',
            'comercial_direccion' => 'required|string|max:100',
            'comercial_cp' => 'required|string|max:5',
            'comercial_telefono' => 'required|string|max:9',
            'comercial_email' => 'required|string|email|max:100|unique:comerciales,comercial_email',
            'comercial_zona' => 'required|string|max:100',
            'id_usuario' => 'required|exists:users,id_usuario',
        ]);

        $comercial = Comercial::create($validatedData);

        return response()->json($comercial, 201);
    }

    // Actualizar un comercial
    public function update(Request $request, $id)
    {
        $comercial = Comercial::find($id);
        if (!$comercial) {
            return response()->json(['message' => 'Comercial no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'comercial_nombre' => 'sometimes|required|string|max:100',
            'comercial_apellidos' => 'sometimes|required|string|max:100',
            'comercial_direccion' => 'sometimes|required|string|max:100',
            'comercial_cp' => 'sometimes|required|string|max:5',
            'comercial_telefono' => 'sometimes|required|string|max:9',
            'comercial_email' => 'sometimes|required|string|email|max:100|unique:comerciales,comercial_email,' . $id . ',id_comercial',
            'comercial_zona' => 'sometimes|required|string|max:100',
            'id_usuario' => 'sometimes|required|exists:users,id_usuario',
        ]);

        $comercial->update($validatedData);

        return response()->json($comercial, 200);
    }

    // Eliminar un comercial
    public function destroy($id)
    {
        $comercial = Comercial::find($id);
        if (!$comercial) {
            return response()->json(['message' => 'Comercial no encontrado'], 404);
        }

        $comercial->delete();

        return response()->json(['message' => 'Comercial eliminado'], 200);
    }
}
