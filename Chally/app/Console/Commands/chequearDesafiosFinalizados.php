<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use App\Desafio;
use App\Respuesta;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\DesafioFinalizado;

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
        function parseToday ($date){
            $arrayDate = explode(" " , $date);
            return $arrayDate[0];
        }
        
        $today = parseToday(Carbon::today());
        
        
        //Traemos todos los desafios que terminen hoy
        $desafiosFinalizados = Desafio::where('fecha_limite', '=' , "$today")->get();
        
        if($desafiosFinalizados){
            
            
            foreach ($desafiosFinalizados as $desafio) {
                
                //Se abren las votaciones para cada desafio que termine hoy
                $desafio->estado_votaciones = 1;
                $desafio->save();
                
                //Con las respuestas del desafio armamos una array con los usuarios participantes
                foreach ($desafio->getRespuestas as $respuesta) {
                    $participantes[] = $respuesta->getUsuario;
                }
                
                //Aqui es donde deberiamos mandar el mail
                if($participantes){
                    foreach ($participantes as $partcipante) {
                        Mail::to($partcipante->email)->send(new DesafioFinalizado($desafio, $partcipante));
                        $this->info('mensaje enviado a ' . $partcipante->email);
                    }
                    
                }
            }
        }
    }
}
