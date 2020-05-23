<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\VotoRespuesta;
use App\Desafio;
use Auth;
Use Alert;
class VotosRespuestasController extends Controller
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
    public function create($id_desafio)
    {
        //Vamos a mostrar todas las respuestas para votar
        $desafio = Desafio::find($id_desafio);
        
        return view('desafio.votar-desafio' , compact('desafio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id_desafio)
    {
       //vamos a chequear que exista el desafio por las dudas
        if(Desafio::find($id_desafio))
        {
            $nuevoVoto = new VotoRespuesta;
            $nuevoVoto->id_desafio = $id_desafio;
            $nuevoVoto->id_respuesta_votada = $request->input('respuesta-votada');
            $nuevoVoto->id_votante = Auth::user()->id_usuario;
            $nuevoVoto->save();
    
            Alert::success('Tu voto se registro correctamente', 'Yas has votado en este desafio');
        }
        
        return redirect('/feed');

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
