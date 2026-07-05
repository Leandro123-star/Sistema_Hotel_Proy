<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->rol === 'recepcionista') {
            abort(403, 'Acceso denegado');
        }
        return $next($request);
    }
}
