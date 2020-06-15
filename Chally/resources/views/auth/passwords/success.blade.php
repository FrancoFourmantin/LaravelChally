@extends('layouts.plantilla-header')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-6 col-lg-5">



                <img class="img-fluid" src="{{asset('img/emails/unsub_success.png')}}" alt="">

                <h2 class="color-verde">¡Contraseña reiniciada exitosamente!</h2>
                <p class="font-weight-bold">Serás redirigido a tu feed en 5 segundos...</p>         
                <a href="{{url('/feed')}}" class="texto-chico"><u>Clickeá acá si no sos redirigido automáticamente</u></a>
                
        </div>
    </div>
</div>
<script> setTimeout(function(){window.location="/feed"}, 5000); </script>
@endsection



