<?php

namespace App\Http\Middleware;
use App\Desafio;
use Closure;
use Auth;
use App\VotoRespuesta;

class autorizarVotaciones
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
        //Primero vamos a chequear que las votaciones del desafio esten abiertas
        $desafio = Desafio::find($request->id_desafio);
        
        if($desafio)
        {
            if($desafio->estado_votaciones)
            {
                //Las votaciones tan abiertas
                //Chequeamos que el usuario haya participado del desafio;
                foreach($desafio->getRespuestas as $respuesta)
                {
                    if($respuesta->getUsuario->id_usuario == Auth::user()->id_usuario)
                    {
                        //Ahora tenemos que ver que el usuario no haya votado ya en el desafio
                        //Chequeamos si exise en la fila en la base de datos
                        if(!VotoRespuesta::where("id_desafio" , "=" , $desafio->id)
                        ->where("id_votante" , '=' , Auth::user()->id_usuario)
                        ->first())
                        {
                            //Lo dejamos entrar al link
                            return $next($request);
                        }   
                        else
                        {
                            $mensajeError = 'Ya votaste en este desafio!';
                        }
                    }
                }
            }
            else
            {
                $mensajeError = 'Las votaciones todavia no me comenzaron o ya terminaron';
            }   
        }
        else
        {
            $mensajeError = "Este desafio no existe";
        }
        
        return response(view('desautorizado', ["mensaje" => $mensajeError]));
        
    }
}
