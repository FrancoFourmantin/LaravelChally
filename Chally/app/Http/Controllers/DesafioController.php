<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Desafio;
use App\Respuesta;
use App\Categoria;
use Carbon\Carbon;


class DesafioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desafios = Desafio::orderBy('fecha_creacion','desc')->get();
        $categorias = Categoria::all();
        $vac = compact('desafios','categorias');
        return view('feed',$vac);
    }

    public function indexCategoria($id)
    {
        $desafios = Desafio::where("id_categoria",$id)->get();
        $categorias = Categoria::all();
        $categoriaActual= Categoria::find($id);

        $vac = compact('desafios','categorias','categoriaActual');
        return view('feed',$vac);
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
            'max' => "El peso máximo de la imagen es de :max kb",
            'image' => "La imagen no es válida",
            'size' => "La imagen supera el peso máximo de :size kb",
            'numeric' => "El campo debe ser un número",
            'date' => "La fecha no es válida",
            'not_in' => "Debes seleccionar una categoría",

        ];

        $reglas= [
            'nombre' => 'required|',
            'imagen' => 'required|file|image|max:1024',
            'id_categoria' => 'required|numeric|not_in:0',
            'descripcion' => 'required|string|min:10',
            'requisitos' => 'required|string|min:10',
            'dificultad' => 'required|numeric',
            'fecha_limite' => 'required|numeric',
        ];

        $request->validate($reglas,$mensajes);
        
        
        $nuevoDesafio = new Desafio();
        $nuevoDesafio->fecha_actualizacion=NULL;
        $nuevoDesafio->nombre = $request->nombre;
        $nombreImagenDesafio = time() . '.' . request()->imagen->getClientOriginalExtension();
        $request->file('imagen')->move(public_path('desafios') , $nombreImagenDesafio);
        $nuevoDesafio->imagen = $nombreImagenDesafio;
        $nuevoDesafio->id_categoria = $request->id_categoria;
        $nuevoDesafio->descripcion = $request->descripcion;
        $nuevoDesafio->requisitos = $request->requisitos;
        $nuevoDesafio->dificultad = $request->dificultad;
        $nuevoDesafio->fecha_limite = Carbon::now()->add($request->fecha_limite,'day')->format('Y-m-d');

        $nuevoDesafio->id_autor = Auth::user()->id_usuario;
        $nuevoDesafio->fecha_creacion = date('Y-m-d H:i:s');

        $nuevoDesafio->save();

        return redirect('/desafio/ver/' . $nuevoDesafio->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desafio=Desafio::find($id);
        $vac=compact("desafio");
        return view("desafio.ver",$vac);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desafio=Desafio::find($id);
        $vac=compact("desafio");
        return view("desafio.editar",$vac);
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
        $mensajes = [
            'required' => "Este campo :attribute es obligatorio",
            'min' => "Necesitan haber minimo :min caracteres",
            'max' => "El peso máximo de la imagen es de :max kb",
            'image' => "La imagen no es válida",
            'size' => "La imagen supera el peso máximo de :size kb",
            'numeric' => "El campo debe ser un número",
            'date' => "La fecha no es válida",
            'not_in' => "Debes seleccionar una categoría",

        ];

        $reglas= [
            'nombre' => 'required|',
            'imagen' => 'file|image|max:1024',
            'id_categoria' => 'required|numeric|not_in:0',
            'descripcion' => 'required|string|min:10',
            'requisitos' => 'required|string|min:10',
            'dificultad' => 'required|numeric',
            'fecha_limite' => 'required|numeric',
        ];

        $request->validate($reglas,$mensajes);
        
        
        $nuevoDesafio = Desafio::find($id);
        $nuevoDesafio->fecha_actualizacion=Carbon::now();
        $nuevoDesafio->nombre = $request->nombre;

        if($request->imagen){
            $nombreImagenDesafio = time() . '.' . request()->imagen->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('desafios') , $nombreImagenDesafio);
            $urlImagen= $nombreImagenDesafio;
            $nuevoDesafio->imagen = $urlImagen;
        }


        $nuevoDesafio->id_categoria = $request->id_categoria;
        $nuevoDesafio->descripcion = $request->descripcion;
        $nuevoDesafio->requisitos = $request->requisitos;
        $nuevoDesafio->dificultad = $request->dificultad;
        $nuevoDesafio->fecha_limite = Carbon::now()->add($request->fecha_limite,'day')->format('Y-m-d');

        $nuevoDesafio->save();

        return redirect('/feed');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $desafioBorrar = Desafio::find($id);

        if($desafioBorrar->id_autor != Auth::user()->id_usuario){
            return "Acceso denegado";
        }
        else{
            $desafioBorrar->delete();
            return redirect ('feed');
        }


    }
}
