<?php

/*
session_start();
require('funciones.php');
$title = "Subir nuevo desafío";
$usuario= Usuario::mantenerSesion();

//Doble chequeo de si existe POST (tanto aqui como en la clase)
if($_POST){
    if(isset($_POST)){

        //Validamos los campos con clase estatica validarCampos que retorna errores en caso de que los haya
        
        $errores = Desafio::validarCampos();    

        //var_dump($errores);
        //Si no existen errores pasamos a crear la clase
        if(!$errores){
            //echo "No encontre erroes";
            $newDesafio = new Desafio;
            $newDesafio->setNombre($_POST['name']);
            $newDesafio->setDescripcion($_POST['descripcion']);
            $newDesafio->setDificultad($_POST['dificultad']);
            $newDesafio->setFecha_creacion(date('Y-m-d'));
            $newDesafio->setFecha_limite($_POST['fechaLimite']);
            $newDesafio->setId_autor($usuario['id_usuario']);
            $newDesafio->setRequisitos($_POST['requisitos']);
            $newDesafio->setId_categoria($_POST['categoria']);
            $newDesafio->setId_respuesta_ganadora(null);
            $newDesafio->setImagen(Desafio::archivarImagen());  //Esto devuelve el nombre de la imagen que es lo que tenemos que guardar en la DB
            $seGuardoEnDb = $newDesafio->guardarEnDB();
            header( 'location:feed.php' );
 
            //header('location:feed.php');exit;
        }

            //var_dump($errores) ;
    }
}
include("include/head.php"); */
?> 


@extends('layouts/plantilla-header')
@section('title' , 'Crear posteo')
@section('clases-body' , 'animated fadeIn')

@section('main')

    <div class="bg-gris">


        <section class="container-fluid px-5">
            <div class="row d-flex align-items-center justify-content-center  flex-wrap">



                <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column my-3">
                    <h3 class="color-verde text-left mb-3 mx-0"><a href="feed.php"><i class="fas fa-arrow-left color-verde"></i></a> Nuevo Desafío</h3>
                    <form class="w-100 needs-validation" method="POST" action="crear" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">

                            <div class="col-12  mb-0 mb-md-4 ">



                                <div class="form-group">
                                    <label class="font-weight-bold" for="inputName">Nombre del Desafío</label>
                                    <input type="text" class="form-control" name="nombre" id="inputName" value="{{old('nombre')}}" placeholder="Diseñá un póster alternativo para la nueva película '1917' ">
                                    <small>¡Describilo lo mejor posible en menos de 60 caracteres!</small>
                                    <small class="text-danger"> @error ('nombre') {{$message}} @enderror </small>
                                </div>


                                <div class="custom-file form-group my-3">
                                    <label class="custom-file-label" for="inputGroupFile01">Foto principal del desafío</label>
                                    <input type="file" id="inputGroupFile01" class="custom-file-input" name="imagen" aria-describedby="inputGroupFileAddon01" value="{{old('imagen')}}">
                                    <small>Foto cuadrada ilustrativa del desafío (Tamaño recomendado: 1000x1000px)</small>
                                    <small class="text-danger"> @error ('imagen') {{$message}} @enderror </small>
                                </div>


                                <div class="form-group mt-4">
                                        <label for="dificultad" class="font-weight-bold">Categoria</label>
                                        <select class="form-control" name="id_categoria" id="categoria">
                                             <option value="0" {{ old('dificultad') == "0" ? "selected" : ""}}>Seleccionar categoria</option>
                                            <option value="1" {{ old('dificultad') == "1" ? "selected" : ""}}>Diseño y Programacion</option>
                                            <option value="2" {{ old('dificultad') == "2" ? "selected" : ""}}>Fotografia</option>   
                                            <option value="3" {{ old('dificultad') == "3" ? "selected" : ""}}>Programacion y Logica</option>
                                        </select>
                                        <??>
                                    </div>
                                    <small class="text-danger"> @error ('id_categoria') {{$message}} @enderror </small>

                                <div class="form-group">
                                    <label for="descripcion" class="font-weight-bold">Descripción del Desafío</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5" >{{old('descripcion')}}</textarea>
                                    <small>Describí el desafío lo mejor posible en pocas palabras</small>
                                    <small class="text-danger"> @error ('descripcion') {{$message}} @enderror </small>

                                </div>

                                <div class="form-group">
                                    <label for="requisitos" class="font-weight-bold">Requisitos del Desafío</label>
                                    <textarea class="form-control" name="requisitos" id="requisitos" rows="5" >{{old('requisitos')}}</textarea>
                                    <small>Colocá en formato lista todas las condiciones que creas necesarias para poder concretar el desafío (Reglas, Software, Formatos, etc)</small>
                                    <small class="text-danger"> @error ('requisitos') {{$message}} @enderror </small>

                                </div>


                                <div class="form-group mt-4">
                                    <label for="dificultad" class="font-weight-bold">Nivel de Dificultad</label>
                                    <select class="form-control" name="dificultad" id="dificultad">
                                        <option value="1" {{ old('dificultad') == "1" ? "selected" : ""}}  >Muy fácil</option>
                                        <option value="2" {{ old('dificultad') == "2" ? "selected" : ""}}>Fácil</option>
                                        <option value="3" {{ old('dificultad') == "3" ? "selected" : ""}}>Intermedio</option>
                                        <option value="4" {{ old('dificultad') == "4" ? "selected" : ""}} >Difícil</option>
                                        <option value="5" {{ old('dificultad') == "5" ? "selected" : ""}}>Experto</option>
                                    </select>
                                </div>
                                <small class="text-danger"> @error ('dificultad') {{$message}} @enderror </small>


                                <div class="form-group mt-4">
                                    <label class="font-weight-bold" for="fechaLimite">Fecha Límite de envío de respuestas</label>
                                    <input type="date" class="form-control" name="fecha_limite" id="fechaLimite" placeholder="" value="{{ old ('fechalimite')}}">
                                    <small>¡El mínimo es de una semana!</small>
                                    <small class="text-danger"> @error ('fechalimite') {{$message}} @enderror </small>

                                </div>




                            </div>









                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">
                                <!--
                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                -->
                                <div class="col-12 d-flex justify-content-between m-0 p-0">

                                    <button type="submit" class="btn btn-secondary">
                                        Publicar Desafío
                                    </button>
                                </div>


                            </div>
                    </form>
                </div>
            </div>

        </section>

    </div>

@endsection