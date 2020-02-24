<!--<?php /*
require_once("config.php");
session_start();

//SI EXISTE LA COOKIE, LA USA PARA CARGAR LA SESIÓN
if(isset($_COOKIE["email"])) {
    crearSesionConCookies();
}

/*
//SI LA SESIÓN NO ESTÁ INICIADA NO SE PUEDE ACCEDER 
if(!isset($_SESSION["email"]) || empty($_SERVER['HTTP_REFERER'])) {
    header("location:index.php");
}


$usuario = Usuario::mantenerSesion(); */
?> -->

@extends('layouts/plantilla-header')
@section('title' , 'Procesando')
@section('clases-body' , 'animated fadeIn')

@section('main')
<body class="animated fadeIn bg-verde">
    <div class="container text-center vh-100 py-2 py-md-5">
        <div class="row procesando shadow my-2 my-md-5 mx-2 mx-md-0">

            <div class="col-12 col-md-5 d-flex flex-column align-items-center bg-white justify-content-center">
                    <h1 class="color-verde">¡Bienvenido <?//=$usuario['nombre'];?>! </h1>
                    <p>Serás redireccionado al feed. <br><span class="small">  <a href="feed.php">Clickeá acá si no sos redireccionado en 5 segundos</a></span></p>       
            </div>

            <div class="col-12 col-md-7 processing">
            </div>
            <?//php header( "refresh:5;url=feed.php" ); ?>
                
        </div>
        <div class="row">
            <div class="col-12">
                <img  style="width:200px;" src="img/logo_chally.svg" alt="">
            </div>
        </div>

    </div>
@endsection


