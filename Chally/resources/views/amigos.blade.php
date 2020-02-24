@extends('layouts/plantilla-header')
@section('title', 'Amigos')
@section('clases-body' , 'perfil animated fadeIn')

@section('main')
    

  <!--Seccion PORTADA -->
  
  <header class="profile">
    <div class="container-fluid">
      <!--<div class="row">-->
        <!--<div class="col-12">-->
          <div class="text-white info_profile text-center pt-5 pb-5">
           <img class="img-thumbnail rounded-circle profile-pic" src="avatars/{{--$_SESSION ?? ''['avatar']--}}" alt="head_profile">   
            <div class="contenedor-main-foto">
            <img class="main-foto" src="avatars/{{--$_SESSION ?? ''['avatar']--}}" alt="">
            </div>
            <h1>{{--$_SESSION ?? ''['name']--}} {{--$_SESSION ?? ''['lastname']--}} </h1>
            <h2>{{--$_SESSION ?? ''['username']--}}</h2>
            <h3>Challys creados: 0</h3>
            <h3>Challys resultos: 9</h3>
          </div>
        <!-- </div> -->
      <!-- </div> -->
    </div>
  </header>
  
  <!--Fin Seccion PORTADA -->
  
  
  <!--Seccion Amigos -->

    <div class="container">
        <div class="barra-amigos">
            <h6>Amigos de <?//=$_SESSION ?? ''['name'] . " " . $_SESSION ?? ''['lastname'];?> (7)</h6>
        </div>
    </div>
    <div class="contenedor-amigos container">
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
        <div class="tarjeta-amigo">
            <div class="contenedor-foto-portada">
                <img class="foto-portada" src="img/foto-ventana-barco.jpg" alt="">
            </div>
            <div class="info-amigo">
                <img class="foto-perfil" src="img/foto-matias-bruno.jpg">
                <h6 class="nombre">Matías Bruno</h6>
                <h6 class="nombre-usuario">@matiasb</h6>
                <div>
                    <a class="boton-mensaje" href="#">Mensaje</a>
                    <a class="estado-amigo" href="#">Amigos</a>
                </div>
                <a class="ver-perfil" href="#">Ver Perfil</a>
            </div>
        </div>
    </div>
    </div>
@endsection