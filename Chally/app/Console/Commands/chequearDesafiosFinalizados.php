<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use App\Desafio;
use App\Respuesta;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DesafioFinalizado;
use App\Mail\FaltaUnDia;
class chequearDesafiosFinalizados extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'chequear:desafios';
    
    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Este comando chequea los desafios finalizados en la base de datos hoy';
    
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
        
        //Simple funcion para parsear la fecha
        function parseDate ($date){
            $arrayDate = explode(" " , $date);
            return $arrayDate[0];
        }
        
        function armarParticipantes($desafio){
            $participantes = [];
            if($desafio->getRespuestas){
                foreach ($desafio->getRespuestas as $respuesta) {
                    $participantes[] = $respuesta->getUsuario;
                }
            }
            return $participantes;
        }
        
        $today = parseDate(Carbon::today());
        
        
        //Traemos todos los desafios que terminen hoy
        $desafiosFinalizados = Desafio::where('fecha_limite', '=' , "$today")->get();
        
        if($desafiosFinalizados->isNotEmpty()){
            foreach ($desafiosFinalizados as $desafio) {      
                
                if($desafio->estado_votaciones == null){
                    //Se abren las votaciones para cada desafio que termine hoy
                    $desafio->estado_votaciones = 1;
                    $desafio->save();
                    //Con las respuestas del desafio armamos una array con los usuarios participantes
                    $participantes = armarParticipantes($desafio);
                    
                    //Aqui es donde deberiamos mandar el mail
                    if($participantes){
                        foreach ($participantes as $partcipante) {
                            Mail::to($partcipante->email)->send(new DesafioFinalizado($desafio, $partcipante));
                        }
                    }
                }
                
            }
        }
        
        //Vamos a chequear que no haya votado y que haya pasado un dia de la finalizacion del desafio
        
        //Seteamos una fecha "ayer"
        
        $ayer = parseDate((new Carbon($today))->subDays(1));
        $desafiosFechaLimiteAyer = Desafio::where('fecha_limite', '=' , "$ayer")->get();
        if($desafiosFechaLimiteAyer->isNotEmpty()){
            
            foreach($desafiosFechaLimiteAyer as $desafio){
                
                if($desafio->estado_votaciones == 1){ //Chequeamos que las votaciones esten abiertas
                    
                    if($desafio->getRespuestas->isNotEmpty()){
                        
                        foreach($desafio->getRespuestas as $respuesta){  //Traemos todas sus respuestas
                            
                            if($desafio->getVotos->isNotEmpty()){
                                
                                foreach($desafio->getVotos as $voto){   //Traemos todos los votos
                                    
                                    if($respuesta->id_autor === $voto->id_votante){ 
                                        continue;
                                    }else{
                                        $usuario = $respuesta->getUsuario;  
                                        Mail::to($usuario->email)->send(new FaltaUnDia($desafio, $usuario));
                                        $this->error("Email enviado a " . $usuario->email);
                                    }
                                }
                            }else{
                                $usuarios = armarParticipantes($desafio);
                                foreach ($usuarios as $usuario) {
                                    Mail::to($usuario->email)->send(new FaltaUnDia($desafio, $usuario));
                                }
                            break;
                        }
                    }  
                }
            }
        }
    }
}
}
