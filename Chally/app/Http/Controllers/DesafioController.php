<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Desafio;

class DesafioController extends Controller
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
    public function create()
    {
        return view('desafio.crear');
        //
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
            'min' => "Necesitan haber minimo :min caracteres",
            'max' => "El máximo es de :max caracteres",
            'image' => "La imagen no es válida",
            'size' => "La imagen supera el peso máximo de :size kb",
            'numeric' => "El campo debe ser un número",
            'date' => "La fecha no es válida"
        ];

        $reglas= [
            'nombre' => 'required|min:20|max:70',
            'imagen' => 'required|file|image|max:1024',
            'id_categoria' => 'required|numeric',
            'descripcion' => 'required|string|min:50',
            'requisitos' => 'required|string|min:50',
            'dificultad' => 'required|numeric',
            'fecha_limite' => 'required|date|after:tomorrow',
        ];

        $request->validate($reglas,$mensajes);
        
        
        $nuevoDesafio = new Desafio();
        $nuevoDesafio->fecha_actualizacion=NULL;
        $nuevoDesafio->nombre = $request->nombre;
        $nombreImagenDesafio = time() . '.' . request()->imagen->getClientOriginalExtension();
        $request->file('imagen')->move(public_path('desafios') , $nombreImagenDesafio);
        $nuevoDesafio->imagen = $nombreImagenDesafio;
        $nuevoDesafio->id_categoria = $request->categoria;
        $nuevoDesafio->descripcion = $request->descripcion;
        $nuevoDesafio->requisitos = $request->requisitos;
        $nuevoDesafio->dificultad = $request->dificultad;
        $nuevoDesafio->fecha_limite = $request->fecha_limite;

        $nuevoDesafio->id_autor = Auth::user()->id_usuario;
        $nuevoDesafio->fecha_creacion = date('Y-m-d');

        $nuevoDesafio->save();

        return redirect('/home/feed');

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
