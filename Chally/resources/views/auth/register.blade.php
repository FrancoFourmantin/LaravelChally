@extends('layouts/plantilla')
@section('title' , 'Registro Chally')
@section('clases-body' , 'animated fadeIn')

@section('main')

<div class="contenedor-registro">
    
    <section class="container-fluid px-5">
        <div class="row d-flex align-items-center justify-content-center vh-100 flex-wrap">
            
            
            
            <div
            class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column align-items-center my-5">
            <a href="/"><img src="img/logo_c.svg" class="logo" alt=""></a>
            <h3 class="color-verde text-center mb-5 ">Registro</h3>
            <form class="w-100 needs-validation" method="POST" action="{{ route('register')}}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputName">Tu nombre</label>
                        <input type="text" class="form-control" name="nombre" required
                        value="@if($nameHero??''){{$nameHero??''}}@else{{old('nombre')}}@endif">
                        <small class="text-danger">@error('nombre') {{$message}} @enderror</small>
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputName">Tu Apellido</label>
                        <input type="text" class="form-control" name="apellido"
                        value="@if($lastnameHero??''){{$lastnameHero??''}}@else{{old('apellido')}}@endif"
                        required>
                        <small class="text-danger">@error('apellido') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-12 col-lg-12  mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputName">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}"
                        >
                        <small class="text-danger">@error('username') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputMail">Tu mail</label>
                        <input type="email" class="form-control " name="email"
                        value="@if($mailHero ?? '') {{$mailHero ?? ''}} @else {{ old('email') }} @endif"
                        required>
                        <small class="text-danger">@error('email') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6   mb-0 mb-md-4">
                    <div class="form-group">
                        <label for="inputMail">Confirmacion mail</label>
                        <input type="email" class="form-control " name="email_confirmation" value="{{old('email')}}" required>
                        <small class="text-danger">@error('email') {{$message}} @enderror</small>
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                    <div class="form-group">
                        <label for="inputPassword">Contraseña<a href="http://" target="_blank"
                            rel="noopener noreferrer"></a></label>
                            <input type="password" class="form-control " name="password" data-toggle="tooltip"
                            data-placement="bottom" title="Mínimo de 8 caracteres" required>
                            <small class="text-danger">@error('password') {{$message}} @enderror</small>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                        <div class="form-group">
                            <label for="inputPassword">Confirma contraseña<a href="http://" target="_blank"
                                rel="noopener noreferrer"></a></label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                                <small class="text-danger">@error('password') {{$message}} @enderror</small>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                            <div class="form-group">
                                <label for="inputFechaNac">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento"
                                placeholder="Date of Birth" value="{{old('fecha_nacimiento')}}" required>
                                <small class="text-danger">@error('fecha_nacimiento') {{$message}} @enderror</small>
                                
                            </div>
                        </div>
                        
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4">
                            <label for="">Sexo</label>
                            <select class="custom-select" name="sexo">
                                <option value="0">Seleccionar</option>
                                <option value="h" {{ old('sexo') == "h" ? "selected" : ""}}>Hombre</option>
                                <option value="m" {{ old('sexo') == "m" ? "selected" : ""}}>Mujer</option>
                            </select>
                            <small class="text-danger">@error('sexo') {{$message}} @enderror</small>
                            
                        </div>
                        
                        <div class="col-6 col-sm-6 col-md-6 col-lg-9 mb-0 mb-md-4 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="true" name="tyc_check">
                                <label class="form-check-label" for="invalidCheck">
                                    Acepto los <a href="#" class="subrayado">términos y condiciones</a> y la <a href="#"
                                    class="subrayado">política de privacidad</a>.
                                </label>
                                <small class="text-danger">@error('tyc_check') {{$message}} @enderror</small>
                            </div>
                        </div>
                        
                        <div class="col-12 ">
                            <!--
                                <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                            -->
                            <button type="submit" class="btn btn-secondary">
                                Registrarme
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        verificarRegistro();
    </script>
    @endsection