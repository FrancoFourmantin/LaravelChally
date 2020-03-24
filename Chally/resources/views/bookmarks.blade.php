@extends('layouts/plantilla-header')
@section('title' , 'Tus bookmarks')
@section('clases-body' , 'animated fadeIn')

@section('main')


    @if($bookmarks->count() != 0)

        @foreach ($bookmarks as $bookmark) 
            {{$bookmark->getDesafio->nombre}}
        @endforeach

    @else
        <h1>No se encontraron bookmarks!</h1>
    @endif



@endsection