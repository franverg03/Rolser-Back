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
        $request->validate([
            'usuario_nombre' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['usuario_nombre' => $request->usuario_nombre, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Si la solicitud viene de Angular (espera JSON)
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Login exitoso',
                    'data' => [
                        'userId' => $user->id,
                        'role' => $user->usuario_rol,
                        'token' => $user->createToken('auth_token')->plainTextToken,
                    ]
                ], 200);
            }

            // Si la solicitud es desde Laravel Blade (redirecciones)
            if ($user->usuario_rol === 'administrativo') {
                return redirect()->route('administrativo.home');
            } elseif ($user->usuario_rol === 'comercial') {
                return redirect()->route('comercial.home');
            } elseif ($user->usuario_rol === 'clienteVip') {
                return redirect()->route('clienteVip.facturas');
            }

            return redirect()->route('dashboard'); // Redirección por defecto
        }

        // Si la solicitud es AJAX (Angular), devolver error JSON
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'Credenciales incorrectas'
            ], 422);
        }

        // Si la solicitud es desde Laravel Blade, redirigir con error
        return back()->withErrors([
            'usuario_nombre' => __('Las credenciales proporcionadas no coinciden con nuestros registros.'),
        ]);
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
