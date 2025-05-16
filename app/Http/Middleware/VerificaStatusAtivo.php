<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificaStatusAtivo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status !== 'ativo') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Usuário inativo. Contate o administrador.'
            ]);
        }

        return $next($request);
    }
}
