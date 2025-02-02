<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    // Obtener todos los almacenes
    public function index()
    {
        return response()->json(Almacen::all(), 200);
    }

    // Obtener un almacén por ID
    public function show($id)
    {
        $almacen = Almacen::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }
        return response()->json($almacen, 200);
    }

    // Crear un nuevo almacén
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'almacen_nombre' => 'required|string|max:100',
            'almacen_ubicacion' => 'required|string|max:200',
            'almacen_capacidad' => 'required|integer|min:0',
            'almacen_localidad' => 'required|string|max:100',
            'almacen_codigo_postal' => 'required|string|max:10',
        ]);

        $almacen = Almacen::create($validatedData);

        return response()->json($almacen, 201);
    }

    // Actualizar un almacén
    public function update(Request $request, $id)
    {
        $almacen = Almacen::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'almacen_nombre' => 'sometimes|required|string|max:100',
            'almacen_ubicacion' => 'sometimes|required|string|max:200',
            'almacen_capacidad' => 'sometimes|required|integer|min:0',
            'almacen_localidad' => 'sometimes|required|string|max:100',
            'almacen_codigo_postal' => 'sometimes|required|string|max:10',
        ]);

        $almacen->update($validatedData);

        return response()->json($almacen, 200);
    }

    // Eliminar un almacén
    public function destroy($id)
    {
        $almacen = Almacen::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }

        $almacen->delete();

        return response()->json(['message' => 'Almacén eliminado'], 200);
    }
}
