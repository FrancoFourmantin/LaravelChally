<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Desafio;
use App\Respuesta;
use Illuminate\Support\Facades\Mail;
use App\Mail\VotacionesFinalizadas;
use App\VotoRespuesta;

class chequearVotacionesFinalizadas extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'chequear:votaciones';
    
    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Chequea las votaciones finalizadas y asigna un ganador';
    
    /**
    * Create a new command instance.
    *
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
    * Execute the console command.
    *
    * @return mixed
    */
    public function handle()
    {
        function buscarDesafioPorIdRespuestas($id_respuesta){
            return Respuesta::find($id_respuesta)->getDesafio->getRespuestas;
        }
        
        function contarPorcentajeDeVotos($todosLosVotos , int $id_respuesta){ 
            $contador = 0;
            if(!empty($todosLosVotos)){
                foreach ($todosLosVotos as $voto) {
                    if($voto->id_respuesta_votada === $id_respuesta){
                        $contador += 1;
                    }
                }
                //Vamos a buscar el desafio con todas sus respuestas para calcular el porcentaje
                $respuestas = buscarDesafioPorIdRespuestas($id_respuesta);
                
                return $porcentajeSobreTodosLosVotos = $contador * 100 / count($respuestas);
            }
        }

        
        $fechaDeFinalizacion = Carbon::now()->addDays(-2)->format('Y-m-d');
        
        $desafios = Desafio::where('fecha_limite' , '=' , "$fechaDeFinalizacion" )->get();
        
        if($desafios){

            foreach ($desafios as $desafio) {

                if($desafio->estado_votaciones){
                    //Cerramos las votaciones
                    $desafio->estado_votaciones = 0;
               
                    //Debemos asignar un ganador
    
                    //Con los votos
                    $votos = VotoRespuesta::where('id_desafio' , '=' , $desafio->id)->get();
    
    
                    foreach ($desafio->getRespuestas as $respuesta) {
                        //Calculamos que porcentaje de votos sobre el total de respuestas tiene y definimos un ganador/es
                        $resultados[$respuesta->id]['id'] = $respuesta->id;
                        $resultados[$respuesta->id]['puntaje'] = contarPorcentajeDeVotos($votos , $respuesta->id);
                    }
    
                    //Funciones para ordenar los resultados
                    usort($resultados , function($a , $b){
                        return $a['puntaje'] <= $b['puntaje'];
                    });
                        
                    
                    
                    $desafio->id_respuesta_ganadora = $resultados['0']['id'];
                    $desafio->save();

                    //Una vez tenemos el ganador le vamos a manda un mail de felicitaciones
                    $usuario = Respuesta::find($desafio->id_respuesta_ganadora)->getUsuario;
                    
                    Mail::to($usuario->email)->send(new VotacionesFinalizadas($desafio, $usuario));

                    $this->error('Email enviado a ganador');
                } 

                // $test = $desafio->getRespuestaGanadora;
                // var_dump($desafio);
            }
        }

    }
    
    

    /**Handle functions */
    
    
    
    
    
    
}
