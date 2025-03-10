<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
{
    if (!Auth::attempt(['usuario_nombre' => $request->usuario_nombre, 'password' => $request->password])) {
        // Manejo de error para JSON (Angular)
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'Credenciales incorrectas'
            ], 422);
        }

        // Manejo de error para Blade
        return back()->withErrors([
            'usuario_nombre' => __('Las credenciales proporcionadas no coinciden con nuestros registros.'),
        ]);
    }

    // Usuario autenticado correctamente
    $request->session()->regenerate();
    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;

    // Respuesta JSON para Angular (almacenando el token en una cookie HttpOnly)
    if ($request->expectsJson()) {
        return response()->json([
            'message' => 'Login exitoso',
            'data' => [
                'userId' => $user->id,
                'role' => $user->usuario_rol,
            ]
        ], 200)->cookie('auth_token', $token, 60 * 24 * 7, '/', null, true, true);
    }

    // Redirecciones en Blade según el rol del usuario
    if ($user->usuario_rol === 'administrativo') {
        return redirect()->route('administrativo.home');
    } elseif ($user->usuario_rol === 'comercial') {
        return redirect()->route('comercial.home');
    } elseif ($user->usuario_rol === 'clienteVip') {
        return redirect()->route('clienteVip.facturas');
    }

    return redirect()->route('/ n'); // Redirección por defecto
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
