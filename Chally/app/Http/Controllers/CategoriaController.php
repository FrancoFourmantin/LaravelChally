<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Desafio;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoriaController extends Controller
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
        $categorias = Categoria::get()->toTree();
        
        // $categorias = Categoria::latest()->get();
        return view('crear-categorias-copy' , compact('categorias'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CategoriasRequest $request)
    {
        
        if($request->submit === "agregar"){
            if(isset($request->categoriaSeleccionada)){
                if(count($request->categoriaSeleccionada) > 1){
                    return redirect()->back()->withErrors(['categoriaSeleccionada' => 'No se pueden seleccionar mas de una categoria para agregar']);
                }else{
                    $padres = Categoria::ancestorsOf($request->categoriaSeleccionada);
                    if(count($padres) >= 1){
                        return redirect()->back()->withErrors(['categoriaSeleccionada' => "No se pueden agregar mas subcategorias (max = 1)"]);
                    }
                }
                if($request->nuevaCategoria == ""){
                    return redirect()->back()->withErrors(['nuevaCategoria' => "Nombre no se puede encontrar vacio"]);
                }
                
                $categoria = new Categoria([
                    'nombre' => $request->nuevaCategoria,
                    'slug' => Str::slug(($request->nuevaCategoria) . "-" . Carbon::now()->timestamp,'-')
                    ]);
                    $categoriaPadre = Categoria::find($request->categoriaSeleccionada[0]);
                    $categoria->appendToNode($categoriaPadre)->save();
                }else{
                    //Ninguna categoria fue seleccionada por ende se agrega la categoria como raiz
                    if($request->nuevaCategoria == ""){
                        return redirect()->back()->withErrors(['nuevaCategoria' => "Nombre no se puede encontrar vacio"]);
                    }
                    
                    $categoria = Categoria::create([
                        'nombre' => $request->nuevaCategoria,
                        'slug' => Str::slug(($request->nuevaCategoria) . "-" . Carbon::now()->timestamp,'-')
                        ]);
                        
                        return redirect()->back();
                    }
                }else{
                    if($request->categoriaSeleccionada){
                        foreach ($request->categoriaSeleccionada as $categoria) {
                            $categoriaEliminar = Categoria::find($categoria);
                            if($categoriaEliminar->nombre == 'Varios'){
                                return redirect()->back()->withErrors(['categoriaSeleccionada' => "Esta categoria no se puede eliminar"]);
                            }
                            $desafios = Desafio::all()->where("id_categoria" , $categoria);
                            foreach ($desafios as $desafio) {
                                $idVarios = Categoria::where("nombre" , "Varios")->first();
                                $desafio->id_categoria = $idVarios->id;
                                $desafio->save();
                            }
                            
                            $categoriaEliminar->delete();
                        }
                        return redirect()->back();
                    }else{
                        return redirect()->back()->withErrors(['categoriaSeleccionada' => 'Debe almenos seleccionar una categoria']);
                    }
                    
                }
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
        