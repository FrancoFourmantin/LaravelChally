<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desafio;
use App\Respuesta;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RespuestaRecibida;
use App\Mail\RespuestaEnviada;
use Illuminate\Support\Str;


class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $desafio = Desafio::where('slug',$slug)->first();
        $vac=compact("desafio");
        return view('respuesta.crear',$vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensajes = [
            'required' => "Este campo :attribute es obligatorio",
            'file' => "El archivo no es válido"

        ];

        $reglas= [
            'descripcion' => 'required|string',
            'archivo' => 'required|file',
        ];

        $request->validate($reglas,$mensajes);
        
        
        $nuevaRespuesta = new Respuesta();
        $nuevaRespuesta->updated_at=NULL;
        $nuevaRespuesta->created_at = date('Y-m-d H:i:s');
        $nuevaRespuesta->descripcion = $request->descripcion;
        $nombreArchivoRespuesta = time() . '.' . request()->archivo->getClientOriginalExtension();
        $request->file('archivo')->move(public_path('respuestas') , $nombreArchivoRespuesta);
        $nuevaRespuesta->archivo = $nombreArchivoRespuesta;
        $nuevaRespuesta->id_autor = Auth::user()->id_usuario;
        $nuevaRespuesta->id_desafio = $request->id_desafio;
        $nuevaRespuesta->save();
        $desafio = Desafio::find($nuevaRespuesta->id_desafio);
        Mail::to($desafio->getUsuario->email)->send(new RespuestaRecibida($nuevaRespuesta,$desafio));
        Mail::to(Auth::user()->email)->send(new RespuestaEnviada($nuevaRespuesta,$desafio));

        return redirect('/desafio/ver/' . $desafio->slug)->with("mensaje","¡Tu respuesta fue publicada satisfactoriamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta=Respuesta::find($id);
        $vac=compact("respuesta");
        return view("respuesta.editar",$vac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_respuesta)
    {
        $mensajes = [
            'required' => "Este campo :attribute es obligatorio",
            'file' => "El archivo no es válido"

        ];

        $reglas= [
            'descripcion' => 'required|string',
            'archivo' => 'file',
        ];

        $request->validate($reglas,$mensajes);
        
        
        $nuevaRespuesta = Respuesta::find($id_respuesta);
        $nuevaRespuesta->updated_at=Carbon::now();
        $nuevaRespuesta->descripcion = $request->descripcion;

        if($request->archivo){
            $nuevaRespuesta->descripcion = $request->descripcion;
            $nombreArchivoRespuesta = time() . '.' . request()->archivo->getClientOriginalExtension();
            $request->file('archivo')->move(public_path('respuestas') , $nombreArchivoRespuesta);
            $nuevaRespuesta->archivo = $nombreArchivoRespuesta;
        }


        $nuevaRespuesta->descripcion = $request->descripcion;

        $desafio=Desafio::find($nuevaRespuesta->id_desafio);


        $nuevaRespuesta->save();

        return redirect('/desafio/ver/' . $desafio->slug)->with("mensaje","¡Editaste tu respuesta satisfactoriamente!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $respuestaBorrar = Respuesta::find($id);

        if($respuestaBorrar->id_autor != Auth::user()->id_usuario){
            return "Acceso denegado";
        }
        else{
            $respuestaBorrar->delete();
            return redirect ('/desafio/ver/' . $respuestaBorrar->id_desafio)->with("mensaje","¡Eliminaste tu respuesta satisfactoriamente!");
        }

    }
}
