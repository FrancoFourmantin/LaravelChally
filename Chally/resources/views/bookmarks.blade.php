@extends('layouts/plantilla-header')
@section('title' , 'Tus bookmarks')
@section('clases-body' , 'animated fadeIn')
<?php use Carbon\Carbon;
?>

@section('main')

    <div class="container py-3 py-md-4">
        <div class="row">
            <div class="col-12">
                <a href="/usuario/{{$username}}"><p class="color-verde text-left  mb-1 mx-0"><i class="fas fa-arrow-left color-verde"></i>&nbsp;Volver a tu perfil</p></a>
                <h1 class="color-verde">Tus bookmarks</h1>
                <p class="text-muted">Acá encontrarás todos los desafíos que guardaste</p>
                <hr>
            </div>
        </div>

            @if($bookmarks->count() != 0)
                <div class="row">
                    <div class="col-12">
                    <div class="card-columns">

                    @foreach ($bookmarks as $bookmark) 
                                <a href="/desafio/ver/{{$bookmark->getDesafio->id}}">
                                    <div class="card position-relative bookmark-item shadow-sm">

                                        @if($bookmark->getDesafio->fecha_limite < Carbon::now() )
                                        
                                        <form class="px-3 pt-2 pb-1 mb-0 d-flex flex-row alert alert-danger justify-content-between" action="/bookmarks/eliminar/{{$bookmark->id}}" method="GET">
                                            @csrf

                                        <p class="mb-0"><i class="fas fa-clock"></i> El desafío finalizó.</p> 

                                            <button id="bookmark-action" type="submit btn">
                                                <i class="fas fa-trash text-danger"></i></button>
                                        </form>


                                        @else

                                        <form class="px-3 pt-2 pb-1 mb-0 d-flex flex-row alert alert-success justify-content-between" action="/bookmarks/eliminar/{{$bookmark->id}}" method="GET">
                                            @csrf

                                        <p class="mb-0"><i class="fas fa-clock"></i> Finaliza el {{$bookmark->getDesafio->fecha_limite}}</p> 

                                            <button id="bookmark-action" type="submit btn">
                                                <i class="fas fa-trash text-danger"></i></button>
                                        </form>


                                        @endif

                                    <img class="card-img-top @if($bookmark->getDesafio->fecha_limite < Carbon::now()) expirado @endif"  src="{{asset('desafios/' . $bookmark->getDesafio->imagen)}}" alt="">
                                        <div class="position-absolute px-3">
                                            <h5 class=" card-title  text-white">
                                                {{$bookmark->getDesafio->nombre}}</h5>
                                                <p class="text-white mb-2"><i class="fas fa-user text-white"></i> {{$bookmark->getDesafio->getRespuestas->count()}} Participantes</p>
                                        </div>

                                    </div>
                                </a>
                                
                    @endforeach
                    </div>                            

                </div>    
                </div>
            @else
                <div class="row justify-content-center">

                    <div class="col-12 col-md-6 text-center">
                        <p class="alert alert-danger">¡Ups! Todavía no guardaste ningún desafío en tus bookmarks.</p>
                        <a href="/feed" class="btn btn-success">Explorar desafíos</a>
                    </div>
                </div>
            @endif
 



    </div>


@endsection