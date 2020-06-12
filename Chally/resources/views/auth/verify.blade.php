@extends('layouts.plantilla-header')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-12">

            <img class="img-fluid" src="{{asset('img/emails/email_verification.jpg')}}" alt="">

            <h2 class="color-verde">¡Ya casi está todo listo!</h2>
            <p class="font-weight-bold">Te acabamos de enviar un mail a tu casilla para que actives tu cuenta.</p>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            ¡Acabamos de reenviarte el mail! Verificá tu casilla nuevamente.
                        </div>
                    @endif
                    
                    <div class="mt-5">
                        <p class="fuente-chica text-muted mb-2">¿No encontraste el mail en tu casilla?</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn  btn-outline-success">Reenviar Mail</button>
                        </form>
                    </div>


        </div>
    </div>
</div>
@endsection
