<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $successStatus = 200;
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
            'password' => 'required|string|max:100',
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
            'password' => 'sometimes|required|string|max:100',
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


    public function register(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'usuario_nombre' => 'required',
            'password' => 'required',
            'usuario_activo' => 'required|boolean',
            'usuario_rol' => 'required',
            'id_administrativo' => 'required',
        ]);

        try {
            // Crear el usuario con la contraseña cifrada
            $user = User::create([
                'usuario_nombre' => $validatedData['usuario_nombre'],
                'password' => Hash::make($validatedData['password']),
                'usuario_activo' => $validatedData['usuario_activo'],
                'usuario_rol' => $validatedData['usuario_rol'],
                'id_administrativo' => $validatedData['id_administrativo'],

            ]);

            // Generar un token de acceso
            $token = $user->createToken('MyApp');

            return response()->json([
                'success' => [
                    'token' => $token->plainTextToken,
                    'usuario_nombre' => $user->usuario_nombre,
                ]
            ], 201);
        } catch (\Exception $e) {
            // Manejar errores inesperados
            return response()->json([
                'error' => 'No se pudo registrar el usuario.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
    {
        // Validación de los campos del formulario
        $request->validate([
            'usuario_nombre' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['usuario_nombre' => $request->usuario_nombre, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken('MyApp')->plainTextToken;

            // Se devuelven los datos del usuario y el token
            return response()->json([
                'success' => true,
                'message' => 'Login exitoso',
                'user' => [
                    'id' => $user->id,
                    'usuario_nombre' => $user->usuario_nombre,
                    'usuario_rol' => $user->usuario_rol, // Asegura que se está enviando
                ],
                'token' => $token
            ])->cookie('token', $token, 60, '/', null, true, true); // Se guarda el token en una cookie httpOnly
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }


    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function logout(Request $request)
    {

        $isUser = $request->user()->token()->revoke();
        if ($isUser) {
            $success['message'] = "Successfully logged out.";
            return response()->json(['success' => $isUser], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
