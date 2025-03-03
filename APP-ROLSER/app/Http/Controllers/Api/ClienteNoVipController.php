<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\ClienteNoVip;
use Illuminate\Http\Request;

class ClienteNoVipController extends Controller
{
    // Obtener todos los clientes no VIP
    public function index()
    {
        return response()->json(ClienteNoVip::with(['usuario', 'comercial'])->get(), 200);
    }

    // Obtener un cliente no VIP por ID
    public function show($id)
    {
        $cliente = ClienteNoVip::with(['usuario', 'comercial'])->whereId($id);

        return response()->json($cliente, 200);
    }

    // Crear un nuevo cliente no VIP
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_empresa' => 'required|string|max:100',
            'cliente_nif' => 'required|string|max:20',
            'cliente_nombre_representante' => 'required|string|max:100',
            'cliente_apellidos_representante' => 'required|string|max:100',
            'cliente_telefono_representante' => 'required|string|max:9',
            'cliente_direccion_empresa' => 'required|string|max:200',
            'cliente_cuenta_bancaria' => 'required|string|max:50',
            'id_usuario' => 'required|exists:users,id_usuario',
            'id_comercial' => 'nullable|exists:comerciales,id_comercial',
        ]);

        $cliente = ClienteNoVip::create($validatedData);

        return response()->json($cliente, 201);
    }

    // Actualizar un cliente no VIP
    public function update(Request $request, $id)
    {
        $cliente = ClienteNoVip::whereId($id);

        $validatedData = $request->validate([
            'cliente_empresa' => 'sometimes|required|string|max:100',
            'cliente_nif' => 'sometimes|required|string|max:20',
            'cliente_nombre_representante' => 'sometimes|required|string|max:100',
            'cliente_apellidos_representante' => 'sometimes|required|string|max:100',
            'cliente_telefono_representante' => 'sometimes|required|string|max:9',
            'cliente_direccion_empresa' => 'sometimes|required|string|max:200',
            'cliente_cuenta_bancaria' => 'sometimes|required|string|max:50',
            // 'id_usuario' => 'sometimes|required|exists:users,id_usuario',
            'id_comercial' => 'sometimes|nullable|exists:comerciales,id_comercial',
        ]);

        $cliente->update($validatedData);

        return response()->json($cliente, 200);
    }

    // Eliminar un cliente no VIP
    public function destroy($id)
    {
        $cliente = ClienteNoVip::whereId($id);

        $cliente->delete();

        return response()->json(['message' => 'Cliente No VIP eliminado'], 200);
    }

}
