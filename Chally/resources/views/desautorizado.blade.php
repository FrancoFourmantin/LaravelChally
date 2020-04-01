@extends('layouts\plantilla-header')
@section('title' , "Desautorizado")
@section('clases-body' , "desautorizado animated fadeIn")
@section('main')
    <main class="container">
        <section class="row d-flex justify-content-center">
            <div class="col-4 vh-100">
                <div class="bg-danger  p-3 mt-3 rounded text-white">
                    {{$mensaje}}
                </div>
            </div>
        </section>
    </main>





















@endsection
    

