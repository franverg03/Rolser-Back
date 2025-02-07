<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function show($id)
    {
        $user = User::whereId($id);

        return response()->json($user, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_nombre' => 'required|string|max:100',
            'usuario_password' => 'required|string|max:100',
            'usuario_activo' => 'required|tinyint|max:1',
            'usuario_rol' => 'required|string|max:50',
            'remember_token' => 'required|string|max:100',
        ]);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::whereId($id);

        $validatedData = $request->validate([
            'usuario_nombre' => 'sometimes|required|string|max:100',
            'usuario_password' => 'sometimes|required|string|max:100',
            'usuario_activo' => 'sometimes|required|tinyint|max:1',
            'usuario_rol' => 'sometimes|required|string|max:50',
            'remember_token' => 'sometimes|required|string|max:100',
        ]);

        $user->update($validatedData);

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::whereId($id);

        $user->delete();
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_nombre' => 'required|string|max:100',
            'usuario_password' => 'required|string|max:100',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user && password_verify($validatedData['password'], $user->password)) {
            return response()->json($user, 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

}
