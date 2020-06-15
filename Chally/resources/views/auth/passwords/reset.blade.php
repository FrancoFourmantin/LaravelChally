@extends('layouts.plantilla-header')

@section('main')
<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-6 col-lg-5">



                <img class="img-fluid" src="{{asset('img/emails/password-image.png')}}" alt="">

                <h2 class="color-verde">Reiniciá tu contraseña</h2>
    
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row justify-content-center">

                        <div class="col-md-6">
                            <label for="email">Tu mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">

                        <div class="col-md-6">
                            <label for="password" class="">Tu contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">

                        <div class="col-md-6">
                            <label for="password-confirm" class="">Repetir contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                            <button type="submit" class="btn btn-secondary">
                              Reiniciar Contraseña
                            </button>
                    </div>
                </form>

    

       



        </div>
    </div>
</div>
@endsection