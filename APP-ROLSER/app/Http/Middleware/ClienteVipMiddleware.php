<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ClienteVipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $rolUser = Auth::user()->usuario_rol;

            if($rolUser === 'clienteVip') {
                return $next($request);
            }

            if($rolUser === 'comercial') {
                return redirect()->route('comercial.home');
            }

            if($rolUser === 'administrativo') {
                return redirect()->route('administrativo.home');
            }
        }
        return redirect()->route('login');
    }
}
