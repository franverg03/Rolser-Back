<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ComercialMiddleware
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

            if($rolUser === 'comercial') {
                return $next($request);
            }

            if($rolUser === 'administrativo') {
                return redirect()->route('administrativo.home');
            }

            if($rolUser === 'clienteVip') {
                return redirect()->route('clienteVip.facturas');
            }
        }
        return redirect()->route('login');
    }
}
