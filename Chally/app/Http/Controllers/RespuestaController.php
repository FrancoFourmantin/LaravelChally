<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desafio;
use App\Respuesta;
use Auth;

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
    public function create($idDesafio)
    {
        $desafio = Desafio::find($idDesafio);
        $vac=compact("desafio");
        return view('respuesta.crear',$vac);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_desafio)
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
        $nuevaRespuesta->id_desafio = $id_desafio;
        $nuevaRespuesta->save();

        return redirect('/desafio/ver/' . $nuevaRespuesta->id_desafio);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
