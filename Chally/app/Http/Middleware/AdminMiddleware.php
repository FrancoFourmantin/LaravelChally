<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role === 'admin'){
            return $next($request);
        }else{
            return response(view('desautorizado', ["mensaje" =>"Este area es solo para administradores ;("]));
            //return view("desautorizado")->with("mensajeError" , "Este area es solo para administradores ;(");
        }
    }
}
    