<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Categoria;
use App\Usuario;
use App\Desafio;
use App\UsuarioCategoria;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeeklyNewsletter;

class SendWeeklyNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar newsletter a todos los usuarios';

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

            // Obtengo todas las categorías actuales
            $categorias=Categoria::all();
    
            foreach($categorias as $categoria){
                // Por cada categoría, obtengo todos los desafíos creados en los últimos 7 días
                $desafios = Desafio::where('id_categoria',$categoria->id)->get()->toArray();
                // $desafios = Desafio::where('id_categoria',$categoria->id)->whereDate('fecha_creacion','>',Carbon::now()->subDays(7))->get()->toArray();
    
                // Si para Categoría X se cumple la condición superior, entonces almacenar en un array con clave idCategoría los desafíos
                if(count($desafios)){
                    $array[$categoria->id]=$desafios;
                }
            }

            // Obtengo todos los usuarios que tengan intereses activados (Es decir, usuarios que se registraron y no tienen intereses no se cargarán)
            $usuariosConIntereses=UsuarioCategoria::query()->distinct()->pluck('id_usuario')->toArray();

            foreach($usuariosConIntereses as $idusuario){
                // Accedo a un usuario particular
                $usuario=Usuario::find($idusuario);
                $intereses=[];
                $desafiosSeleccionados=[];

                // Accedo a todos los intereses de ese usuario;
                foreach($usuario->getCategorias as $categoria){
                    // Se crea un array con el ID de cada categoría de interés del usuario.
                    $intereses[] = $categoria->id;
                }
                
                // Accedo uno por uno a todos los intereses de ese usuario
                foreach($intereses as $interes){
                    // Evalúo si hay desafíos que concuerden con ese interés particular
                    if(array_key_exists(strval($interes),$array)){
                        // Retorno todos los desafíos en los cuales el usuario estará interesado.
                        $desafiosSeleccionados[] = $array[strval($interes)];
                    }
                }
        
                Mail::to($usuario->email)->send(new WeeklyNewsletter($desafiosSeleccionados,$usuario));

            }
    }
}
