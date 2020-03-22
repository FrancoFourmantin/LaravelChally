@extends('layouts/header-no-footer')
@section('title' , 'Categorias')
@section('clases-body' , '')

@section('main')

<div class="contenedor-categorias">      
    <section class="container-fluid">
        <div class="row d-flex pr-5 justify-content-center mt-5">

                            
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 shadow contacto-form px-5 py-3 mx-5 d-flex flex-column align-items-center">
                <h3 class="color-verde text-center mb-4">Modificar categorias</h3>
                <form class="w-100" method="POST" action="agregarCategoria">
                    @csrf
                    <label for="exampleFormControlSelect1">Categorias</label>
                    <select class="form-control" id="categoriaPadre" name="categoriaPadre">
                        <option value="none">Nueva categoria padre</option>
                        @foreach ($categorias as $categoria)
                        @if (count($categoria->descendants) >= 1)
                        <optgroup label="{{$categoria->nombre}}">
                            @foreach ($categoria->descendants as $categoriaHijo)
                            <option value="{{$categoriaHijo->id}}">{{$categoriaHijo->nombre}}</option>
                            @endforeach
                            <option style="font-style:italic" value="{{$categoria->id}}">--Agregar subcategoria en {{$categoria->nombre}}</option>
                        </optgroup>
                        @else
                        <option style="font-weight: bold" value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                    <small class="text-danger">@error('categoriaPadre') {{$message}} @enderror</small>
                    
                    <div class="form-group">
                        <label for="inputName">Nombre nueva categoria</label>
                        <input type="text" class="form-control" id="inputName" name="nuevaCategoria">
                        <small class="text-danger">@error('nuevaCategoria') {{$message}} @enderror</small>
                    </div>
                    
                    <a class="btn btn-secondary d-inline p-2" href="#" role="button">Eliminar</a>
                    <button class="btn btn-secondary d-inline" type="submit">Agregar</button>
                </form>    
                
            </div>
            
            <div class="form-group">
                
            </div>
        </section>
        <div>
            
            
            @endsection