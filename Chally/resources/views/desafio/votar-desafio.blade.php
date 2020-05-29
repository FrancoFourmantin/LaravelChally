@extends('layouts/plantilla-header')
@section('title' , 'Votar respuesta')
@section('clases-body' , 'votar-respuesta')

@section('main')

<div class="main-votaciones">
    
    <main class="primerTarjeta">

        <section class="primerTarjeta__header">
            <h1 class="primerTarjeta__title">Final Round</h1>
            <p class="primerTarjeta__subtitle primerTarjeta__subtitle--gray">Es hora de ver quien ganara este chally</p>
        </section>

        <section class="primerTarjeta__contenedorImagen ">
            <img class="primerTarjeta__imagen" src="{{asset('img/cup-guy-2.png')}}" alt="hombre con trofeo">
        </section>
        
        <section class="primerTarjeta__footer ">
            <h2 class="primerTarjeta__title primerTarjeta__title--small">¿Ya sabes tu respuesta?</h2>
            <p class="primerTarjeta__subtitle primerTarjeta__subtitle--gray ">Vota ahora mismo al ganador del desafio ¡Podrias ser vos!</p>
            <div class="primerTarjeta__buttons ">
                <a class="primerTarjeta__link primerTarjeta__link--active boton-votar" href="#">Votar</a>
                <a class="primerTarjeta__link " href="/desafio/ver/{{$desafio->id}}">Ver respuestas</a>
            </div>
        </section>

    </main>
    
    
    <section class="vote-menu d-none ">
        
        <i class="vote-menu__arrowback fas fa-long-arrow-alt-left"></i>
        
        <div class="vote-menu__header mt-4">
            <h2 class="vote-menu__title">¡Elegi la respuesta ganadora!</h2>
            <p class="vote-menu__subtitle vote-menu__subtitle--gray  ">Debe seleccionar una unica respuesta que consideres sea la mejor para este desafio.</p>
        </div>
        
        <div class="respuestas ">
            {{-- Aqui comienza la tarjeta de "respusta" --}}
            @foreach ($desafio->getRespuestas as $respuesta)
            <div class="respuesta  mb-3">
                <div class="respuesta__contenedor ">
                    <div class="respuesta__header  mb-3">
                        <img class="respuesta__img" src="{{asset('avatars/' . $respuesta->getUsuario->avatar)}}" alt="foto-perfil-usuario">
                        <span class="respuesta__name bolder">{{$respuesta->getUsuario->nombre}}</span>
                    </div>
                    <div class="respuesta__desc-container mb-3">
                        <p class="respuesta__descripcion ">{{$respuesta->descripcion}}</p>
                    </div>
                    <div class="respuesta__botones ">
                        <form class="respuesta__form d-inline" action="/votar-desafio/{{$desafio->id}}" method="POST">
                            @csrf
                            <input class="respuesta__input" type="hidden" value="{{$respuesta->id}}" name="respuesta-votada">
                            <input class="respuesta__input"type="hidden" name="name" value="{{$respuesta->getUsuario->nombre}}">
                            <button type="submit" class="respuesta__button respuesta__button--active">Votame!</button>
                        </form>
                        <a class="respuesta__button" href="#">Ver respuesta</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        
        
        <div class="confirm-footer p-1 pb-3 d-none footer-respuesta w-100 flex-column justify-content-between align-items-center">
            <span class="confirm-footer__close text-white align-self-end p-absolute close-footer">Close X</span>
            <span class="confirm-footer__text text-white">Seleccionaste respuesta de:</span>
            <strong class="confirm-footer__name confirm-footer__name--verde color-verde">Name</strong>
            <button class="confirm-footer__button confirm-footer__button--active confirmar-seleccion btn text-white btn-large bg-success">Confirmar selección</button>
        </div>
        
    </section>
</div>


<script src="{{asset('js/votar-respuesta_functions.js')}}"></script>
@endsection