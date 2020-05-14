@extends('layouts/plantilla')
@section('title' , 'Registro Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')

<div class="contenedor-registro">
    
    <section class="container-fluid px-5">
        <div class="row d-flex align-items-center justify-content-center vh-100 flex-wrap">
            

            <?php
                $arrayNombre = explode(" ",$social_user->name);
                $nombre = $arrayNombre[0];
                $apellido = $arrayNombre[1];
            ?>

            <div
            class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column align-items-center my-5">
            <a href="/"><img src="img/logo_c.svg" class="logo" alt=""></a>
            <h3 class="color-verde text-center mb-3 ">¡Completá el registro!</h3>
            <img src="{{$social_user->avatar}}" class="rounded-circle text-center d-block mb-4 shadow" style="max-width:100px" alt="">

            <form class="w-100 needs-validation" method="POST" action="{{ route('register')}}"
            enctype="multipart/form-data">
            @csrf
            
            <div class="form-row">


                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-4 ">

                    <div class="form-group">

                        <label >Tu nombre</label>
                        <input type="text" inputname="Nombre" class="form-control" name="nombre" id="nombre"  required
                        value="{{$nombre}}">
                        <small class="text-danger">@error('nombre') {{$message}} @enderror</small>
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputName">Tu Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" inputname="Apellido"
                    value="{{$apellido}}"
                        required>
                        <small class="text-danger">@error('apellido') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-12 col-lg-12  mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputName">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="username" inputname="Nombre de usuario" value="{{preg_replace("/[^a-zA-Z]+/", "", $social_user->name)}}"
                        >
                        <small class="text-danger">@error('username') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputMail">Tu mail</label>
                        <input type="email" class="form-control " name="email" id="email"
                        value="@if($social_user ?? '') {{$social_user->email ?? ''}} @else {{ old('email') }} @endif"
                        required>
                        <small class="text-danger">@error('email') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6   mb-0 mb-md-4">
                    <div class="form-group">
                        <label for="inputMail">Confirmacion mail</label>
                        <input type="email" id="email-confirmacion" class="form-control " name="email_confirmation" value="{{$social_user->email}}" required>
                        <small class="text-danger">@error('email') {{$message}} @enderror</small>
                    </div>
                </div>
                
                        
                        
                        
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                            <div class="form-group">
                                <label for="inputFechaNac">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha" inputname="Fecha de Nacimiento"
                                placeholder="Date of Birth" value="{{old('fecha_nacimiento')}}" required>
                                <small class="text-danger">@error('fecha_nacimiento') {{$message}} @enderror</small>
                            </div>
                        </div>
                        
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4">
                            <label for="">Sexo</label>
                            <select class="custom-select" name="sexo" id="sexo" inputname="Sexo">
                                <option value="0">Seleccionar</option>
                                <option value="h" {{ old('sexo') == "h" ? "selected" : ""}}>Hombre</option>
                                <option value="m" {{ old('sexo') == "m" ? "selected" : ""}}>Mujer</option>
                            </select>
                            <small class="text-danger">@error('sexo') {{$message}} @enderror</small>
                        </div>
                        
                        <div class="col-6 col-sm-6 col-md-6 col-lg-9 mb-0 mb-md-4 ">
                            <div class="form-check">
                                
                                <input class="form-check-input" type="checkbox" value="true" name="tyc_check" id="tyc_check" inputName="Términos y Condiciones">
                                <label class="small form-check-label" for="invalidCheck">
                                    Acepto los <a href="#" class="subrayado">términos y condiciones</a> y la <a href="#"
                                    class="subrayado">política de privacidad</a> de Chally.
                                </label>

                                <small class="text-danger">@error('tyc_check') {{$message}} @enderror</small>
                            </div>
                        </div>

                        <input type="hidden" name="registration_type" value="social">

                        <input type="hidden" name="avatar" value="{{$avatarURL}}">
                        
                        <div class="col-12 ">
                            <!--
                                <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                            -->
                            <button type="submit" id="submit-register" class="btn btn-dark">
                                Registrarme
                            </button>
          
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/frontend_validations.js') }}"></script>

    <script>
        /*
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        */
        validarRegistro();
    </script>
    @endsection