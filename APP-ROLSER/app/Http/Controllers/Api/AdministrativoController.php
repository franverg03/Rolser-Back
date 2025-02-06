<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Administrativo;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    // Obtener todos los administrativos
    public function index()
    {
        return response()->json(Administrativo::all());
    }


    // Obtener un administrativo por ID
    public function show($id)
    {
        $administrativo = Administrativo::find($id);
        if (!$administrativo) {
            return response()->json(['message' => 'Administrativo no encontrado'], 404);
        }
        return response()->json($administrativo, 200);
    }

    // Crear un nuevo administrativo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'administrativo_nombre' => 'required|string|max:100',
            'administrativo_apellidos' => 'required|string|max:100',
            'administrativo_direccion' => 'required|string|max:100',
            'administrativo_cp' => 'required|string|max:5',
            'administrativo_telefono' => 'required|string|max:9',
            'administrativo_email' => 'required|string|email|max:100|unique:administrativos,administrativo_email',
            'administrativo_departamento' => 'required|string|max:100',
        ]);

        $administrativo = Administrativo::create($validatedData);

        return response()->json($administrativo, 201);
    }

    // Actualizar un administrativo
    public function update(Request $request, $id)
    {
        $administrativo = Administrativo::find($id);
        if (!$administrativo) {
            return response()->json(['message' => 'Administrativo no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'administrativo_nombre' => 'sometimes|required|string|max:100',
            'administrativo_apellidos' => 'sometimes|required|string|max:100',
            'administrativo_direccion' => 'sometimes|required|string|max:100',
            'administrativo_cp' => 'sometimes|required|string|max:5',
            'administrativo_telefono' => 'sometimes|required|string|max:9',
            'administrativo_email' => 'sometimes|required|string|email|max:100|unique:administrativos,administrativo_email,' . $id . ',id_administrativo',
            'administrativo_departamento' => 'sometimes|required|string|max:100',
        ]);

        $administrativo->update($validatedData);

        return response()->json($administrativo, 200);
    }

    // Eliminar un administrativo
    public function destroy($id)
    {
        $administrativo = Administrativo::find($id);
        if (!$administrativo) {
            return response()->json(['message' => 'Administrativo no encontrado'], 404);
        }

        $administrativo->delete();

        return response()->json(['message' => 'Administrativo eliminado'], 200);
    }
}
