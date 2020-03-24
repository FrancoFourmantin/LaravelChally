@extends('layouts/plantilla-header')
@section('title' , 'Amigos')
@section('clases-body' , 'perfil animated fadeIn')

@section('main')
    <div class="container">
            <div class="barra-amigos">
                <h6>Amigos de {{$usuario->nombre}} {{$usuario->apellido}} ({{count($amigos)}})</h6>
            </div>
        </div>
        <div class="contenedor-amigos container">
            @foreach($amigos as $amigo)
                <div class="tarjeta-amigo card-shadow">
                    <div class="info-amigo">
                        <img class="foto-perfil" src="avatars/{{$amigo->avatar}}">
                        <h6 class="nombre">{{$amigo->nombre}} {{$amigo->apellido}}</h6>
                        <h6 class="nombre-usuario">{{$amigo->username}}</h6>
                        <div>
                            <a class="boton-mensaje" href="#">Mensaje</a>
                            <a class="estado-amigo" href="#">Amigos</a>
                        </div>
                        <a class="ver-perfil" href="/usuario/{{$amigo->username}}">Ver Perfil</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection