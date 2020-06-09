<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Si el usuario está autenticado e intenta entrar a localhost:8000 (Home) Redireccionar a:
        if (Auth::guard($guard)->check()) {
            return redirect('/feed');
        }

        return $next($request);
    }
}
