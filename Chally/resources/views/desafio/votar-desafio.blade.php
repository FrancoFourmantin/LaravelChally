@extends('layouts/plantilla-header')
@section('title' , 'Votar respuesta')
@section('clases-body' , 'votar-respuesta')

@section('main')

<div class="main-votaciones contenedor-main-votar-respuesta">
    
    <main class="primer-tarjeta contenedor-votar-respuesta">
        <section class="header contenedor-title-votar-respuesta">
            <h1 class="header__title">Final Round</h1>
            <p class="header__subtitle header__subtitle--gray texto-gris">Es hora de ver quien ganara este chally</p>
        </section>
        <section class="imagen contenedor-imagen-votar-respuesta">
            <img class="imagen__imagen" src="{{asset('img/cup-guy-2.png')}}" alt="hombre con trofeo">
        </section>
        <section class="bottom contenedor-informacion-votar-respuesta">
            <h2 class="bottom__title">¿Ya sabes tu respuesta?</h2>
            <p class="bottom__subtitle bottom__subtitle--gray texto-gris">Vota ahora mismo al ganador del desafio ¡Podrias ser vos!</p>
            <div class="buttons contenedor-botones-votar-respuesta">
                <a class="buttons__link buttons__link--active boton-votar" href="#">Votar</a>
                <a class="buttons__link boton-ver-respuestas" href="/desafio/ver/{{$desafio->id}}">Ver respuestas</a>
            </div>
        </section>
    </main>
    
    
    <section class="vote-menu d-none contenedor-menu-elegir">
        
        <i class="vote-menu__arrowback fas fa-long-arrow-alt-left flecha-atras-votar color-verde"></i>
        
        <div class="vote-menu__header mt-4 title">
            <h2 class="vote-menu__title">¡Elegi la respuesta ganadora!</h2>
            <p class="vote-menu__subtitle texto-gris">Debe seleccionar una unica respuesta que consideres sea la mejor para este desafio.</p>
        </div>
        
        <div class="respuestas contenedor-lista-respuesta">
            {{-- Aqui comienza la tarjeta de "respusta" --}}
            @foreach ($desafio->getRespuestas as $respuesta)
            <div class="respuesta contenedor-respuesta mb-3">
                <div class="respuesta contenedor-user-info">
                    <div class="respuesta__header user-info-header mb-3">
                        <img class="respuesta__img" width="50px" height="50px" src="{{asset('avatars/' . $respuesta->getUsuario->avatar)}}" alt="foto-perfil-usuario">
                        <span class="respuesta__name nombre-usuario-votar bolder">{{$respuesta->getUsuario->nombre}}</span>
                    </div>
                    <div class="respuesta__desc-container contenedor-user-descripcion mb-3">
                        <p class="respuesta__descripcion texto-gris descripcion-respuesta">{{$respuesta->descripcion}}</p>
                    </div>
                    <div class="respuesta__botones contenedor-user-botones">
                        <form class="respuesta__form d-inline" action="/votar-desafio/{{$desafio->id}}" method="POST">
                            @csrf
                            <input class="respuesta__input" type="hidden" value="{{$respuesta->id}}" name="respuesta-votada">
                            <button type="submit" class="respuesta__button respuesta__button--active votame">Votame!</button>
                        </form>
                        <a class="respuesta__button texto-gris" href="#">Ver respuesta</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        
        
        <div class="confirm-footer p-1 pb-3 d-none footer-respuesta w-100 flex-column justify-content-between align-items-center">
            <span class="confirm-footer__close text-white align-self-end p-absolute close-footer">Close X</span>
            <span class="confirm-footer__text text-white">Seleccionaste respuesta de:</span>
            <strong class="confirm-footer_name confirm-footer_name--verde color-verde">Name</strong>
            <button class="confirm-footer_button confirm-footer_button--active confirmar-seleccion btn text-white btn-large bg-success">Confirmar selección</button>
        </div>
        
    </section>
</div>


<script src="{{asset('js/votar-respuesta_functions.js')}}"></script>
@endsection