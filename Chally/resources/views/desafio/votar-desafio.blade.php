@extends('layouts/plantilla-header')
@section('title' , 'Votar respuesta')
@section('clases-body' , 'votar-respuesta')

@section('main')

<div class="contenedor-main-votar-respuesta">
    
    <main class="contenedor-votar-respuesta">
        <section class="contenedor-title-votar-respuesta">
            <h1>Final Round</h1>
            <p class="texto-gris">Es hora de ver quien ganara este chally</p>
        </section>
        <section class="contenedor-imagen-votar-respuesta">
            <img src="{{asset('img/cup-guy-2.png')}}" alt="hombre con trofeo">
        </section>
        <section class="contenedor-informacion-votar-respuesta">
            <h2>¿Ya sabes tu respuesta?</h2>
            <p class="texto-gris">Vota ahora mismo al ganador del desafio ¡Podrias ser vos!</p>
            <div class="contenedor-botones-votar-respuesta">
                <a class="boton-votar" href="#">Votar</a>
            <a class="boton-ver-respuestas" href="/desafio/ver/{{$desafio->id}}">Ver respuestas</a>
            </div>
        </section>
    </main>
    
    
    <section class="d-none contenedor-menu-elegir">
        
        <i class="fas fa-long-arrow-alt-left flecha-atras-votar color-verde"></i>
        
        <div class="mt-4 title">
            <h2>¡Elegi la respuesta ganadora!</h2>
            <p class="texto-gris">Debe seleccionar una unica respuesta que consideres sea la mejor para este desafio.</p>
        </div>
        
        <div class="contenedor-lista-respuesta">
            {{-- Aqui comienza la tarjeta de "respusta" --}}
            @foreach ($desafio->getRespuestas as $respuesta)
            <div class="contenedor-respuesta mb-3">
                <div class="contenedor-user-info">
                    <div class="user-info-header mb-3">
                        <img width="50px" height="50px" src="{{asset('avatars/' . $respuesta->getUsuario->avatar)}}" alt="foto-perfil-usuario">
                    <span class="nombre-usuario-votar bolder">{{$respuesta->getUsuario->nombre}}</span>
                    </div>
                    <div class="contenedor-user-descripcion mb-3">
                    <p class=" texto-gris descripcion-respuesta">{{$respuesta->descripcion}}</p>
                    </div>
                    <div class="contenedor-user-botones">
                    <form class="d-inline" action="/votar-desafio/{{$desafio->id}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$respuesta->id}}" name="respuesta-votada">
                        <button type="submit" class="votame">Votame!</button>
                    </form>
                        <a class="texto-gris" href="#">Ver respuesta</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        
        
        <div class="p-1 pb-3 d-none footer-respuesta w-100 flex-column justify-content-between align-items-center">
            <span class="text-white align-self-end p-absolute close-footer">Close X</span>
        <span class="text-white">Seleccionaste respuesta de:</span>
            <strong class="color-verde"></strong>
            <button class="confirmar-seleccion btn text-white btn-large bg-success">Confirmar selección</button>
        </div>
        
    </section>
</div>


<script src="{{asset('js/votar-respuesta_functions.js')}}"></script>
@endsection