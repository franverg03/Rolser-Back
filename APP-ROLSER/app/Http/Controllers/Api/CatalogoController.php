<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use Illuminate\Http\Request;


class CatalogoController extends Controller
{
    // Obtener todos los catálogos
    public function index()
    {
        return response()->json(Catalogo::all(), 200);
    }

    // Obtener un catálogo por ID
    public function show($id)
    {
        $catalogo = Catalogo::whereId($id);

        return response()->json($catalogo, 200);
    }

    // Crear un nuevo catálogo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'catalogo_nombre' => 'required|string|max:255',
            'fechaIni' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaIni',
            'catalogo_estado' => 'required|boolean',
            'catalogo_tipo' => 'required|string|max:255',
        ]);

        $catalogo = Catalogo::create($validatedData);

        return response()->json($catalogo, 201);
    }

    // Actualizar un catálogo
    public function update(Request $request, $id)
    {
        $catalogo = Catalogo::whereId($id);


        $validatedData = $request->validate([
            'catalogo_nombre' => 'sometimes|required|string|max:255',
            'fechaIni' => 'sometimes|required|date',
            'fechaFin' => 'sometimes|required|date|after_or_equal:fechaIni',
            'catalogo_estado' => 'sometimes|required|boolean',
            'catalogo_tipo' => 'sometimes|required|string|max:255',
        ]);

        $catalogo->update($validatedData);

        return response()->json($catalogo, 200);
    }

    // Eliminar un catálogo
    public function destroy($id)
    {
        $catalogo = Catalogo::whereId($id);

        $catalogo->delete();

        return response()->json(['message' => 'Catálogo eliminado'], 200);
    }
}
