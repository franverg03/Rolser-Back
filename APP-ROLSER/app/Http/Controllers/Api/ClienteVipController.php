<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\ClienteVip;
use Illuminate\Http\Request;

class ClienteVipController extends Controller
{
    // Obtener todos los clientes VIP
    public function index()
    {
        return response()->json(ClienteVip::with(['usuario', 'comercial'])->get(), 200);
    }

    // Obtener un cliente VIP por ID
    public function show($id)
    {
        $cliente = ClienteVip::with(['usuario', 'comercial'])->whereId($id);

        return response()->json($cliente, 200);
    }

    // Crear un nuevo cliente VIP
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_empresa' => 'required|string|max:100',
            'cliente_nif' => 'required|string|max:20',
            'cliente_nombre_representante' => 'required|string|max:100',
            'cliente_apellidos_representante' => 'required|string|max:100',
            'cliente_telefono_representante' => 'required|string|max:9',
            'cliente_email_representante' => 'required|string|max:100',
            'cliente_direccion_empresa' => 'required|string|max:200',
            'cliente_cuenta_bancaria' => 'required|string|max:50',
        ]);

        $cliente = ClienteVip::create($validatedData);

        return response()->json($cliente, 201);
    }

    // Actualizar un cliente VIP
    public function update(Request $request, $id)
    {
        $cliente = ClienteVip::whereId($id);

        $validatedData = $request->validate([
            'cliente_empresa' => 'sometimes|required|string|max:100',
            'cliente_nif' => 'sometimes|required|string|max:20',
            'cliente_nombre_representante' => 'sometimes|required|string|max:100',
            'cliente_apellidos_representante' => 'sometimes|required|string|max:100',
            'cliente_telefono_representante' => 'sometimes|required|string|max:9',
            'cliente_email_representante' => 'required|string|max:100',
            'cliente_direccion_empresa' => 'sometimes|required|string|max:200',
            'cliente_cuenta_bancaria' => 'sometimes|required|string|max:50',
        ]);

        $cliente->update($validatedData);

        return response()->json($cliente, 200);
    }

    // Eliminar un cliente VIP
    public function destroy($id)
    {
        $cliente = ClienteVip::whereId($id);

        $cliente->delete();

        return response()->json(['message' => 'Cliente VIP eliminado'], 200);
    }
}
