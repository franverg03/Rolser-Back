<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClienteVip;
use Illuminate\Http\Request;

class clienteVipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clienteVip = ClienteVip::find($id);
        if (!$clienteVip) {
            return redirect()->back()->with('error', 'Cliente no encontrado.');
        }
        return view('clientes_vip.show', ['clienteVip' => $clienteVip]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function actualizar(Request $request)
    {

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

        ClienteVip::whereId($request->id)->update($validatedData);
        return redirect()->back()->with('success', 'Cliente actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
