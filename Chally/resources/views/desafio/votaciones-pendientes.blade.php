@extends('layouts/plantilla-header')
@section('title' , 'Desafios Pendientes')
@section('clases-body' , 'animated fadeIn')
<?php use Carbon\Carbon;
?>

@section('main')

    <div class="container py-3 py-md-4">
        <div class="row">
            <div class="col-12">
            <a href="/usuario/{{Auth::user()->username}}"><p class="color-verde text-left  mb-1 mx-0"><i class="fas fa-arrow-left color-verde"></i>&nbsp;Volver a tu perfil</p></a>
                <h1 class="color-verde">Votaciones pendientes</h1>
                <p class="text-muted">Acá encontrarás todas las votaciones abiertas en las cuales debes votar</p>
                <hr>
            </div>
        </div>

            @if($desafiosPendientes)    
                <div class="row">
                    <div class="col-12">
                    <div class="card-columns">
                    @foreach ($desafiosPendientes as $desafio) 
                                <a href="/desafio/ver/{{$desafio->slug}}">
                                    <div class="card position-relative bookmark-item shadow-sm">

                                        @if($desafio->fecha_limite < (new Carbon($desafio->fecha_limte))->subDays(1))
                                        
                                        <form class="px-3 pt-2 pb-1 mb-0 d-flex flex-row alert alert-warning align-items-center justify-content-between" action="/votar-desafio/{{$desafio->id}}" method="GET">
                                           

                                        <p class="mb-0 text-danger"><i class="fas fa-clock"></i>&nbsp; 1 dia para finalizar</p> 

                                            <button id="bookmark-action" class="btn bg-verde color-verde" type="submit">
                                                <i class="fas fa-user-edit"></i>Votar ahora!</button>
                                        </form>


                                        @else

                                    <form class="px-3 pt-2 pb-1 mb-0 d-flex flex-row alert alert-success justify-content-between" action="/votar-desafio/{{$desafio->id}}'" method="GET">
                                     

                                        <p class="mb-0"><i class="fas fa-clock"></i> Finaliza el {{(new Carbon($desafio->fecha_limite))->addDays(2)->format('d-m-Y')}}</p> 

                                            <button id="bookmark-action" class="bolder" type="submit btn">
                                                <i class="fas fa-trophy color-verde"></i>&nbsp;Votar</button>
                                        </form>


                                        @endif

                                    <img class="card-img-top @if($desafio->estado_votaciones === 0) expirado @endif"  src="{{asset('desafios/' . $desafio->imagen)}}" alt="">
                                        <div class="position-absolute px-3">
                                            <h5 class=" card-title  text-white">
                                                {{$desafio->nombre}}</h5>
                                                <p class="text-white mb-2"><i class="fas fa-user text-white"></i> {{$desafio->getRespuestas->count()}} Participantes</p>
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
                        <p class="alert alert-danger">¡Ups! Todavia no tienes ningun desafio en el que votar</p>
                        <a href="/feed" class="btn btn-success">Explorar desafíos</a>
                    </div>
                </div>
            @endif
 



    </div>


@endsection