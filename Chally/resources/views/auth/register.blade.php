    @extends('layouts/plantilla')
    @section('title' , 'Registro Chally')
    @section('clases-body' , 'animated fadeIn')
    
    @section('main')
    
        <div class="contenedor-registro">
            
            <section class="container-fluid px-5">
                <div class="row d-flex align-items-center justify-content-center vh-100 flex-wrap">
                    
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column align-items-center my-5">
                        <a href="/"><img  src="img/logo_c.svg" class="logo" alt=""></a>
                        <h3 class="color-verde text-center mb-5 ">Registro</h3>
                        <form class="w-100 needs-validation" method="POST" action="{{ route('register')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu nombre</label>
                                        <input type="text" class="form-control" name="nombre" required value="@if($nameHero ?? '') {{$nameHero ?? ''}} @else {{ old('nombre') }} @endif">
                                        <small>@error('nombre')  {{$message}} @enderror</small>

                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu Apellido</label>
                                        <input type="text" class="form-control" name="apellido" value="@if($lastnameHero ?? '') {{$lastnameHero ?? ''}} @else {{ old('apellido') }} @endif" required>
                                        <small>@error('apellido')  {{$message}} @enderror</small>

                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Nombre de usuario</label>
                                        <input type="text" class="form-control" name="username" value="{{old('username')}}" required>
                                        <small>@error('username') {{$message}} @enderror</small>
                                      
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputMail">Tu mail</label>
                                        <input type="email" class="form-control " name="email" value="@if($mailHero ?? '') {{$mailHero ?? ''}} @else {{ old('email') }} @endif" required>
                                        <small>@error('email') {{$message}} @enderror</small>

                                        </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6   mb-0 mb-md-4">
                                    <div class="form-group">
                                        <label for="inputMail">Confirmacion mail</label>
                                        <input type="email" class="form-control " name="email_confirmation" value="" required>
                                        <small>@error('email') {{$message}} @enderror</small>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control " name="password" data-toggle="tooltip" data-placement="bottom" title="Mínimo de 8 caracteres, un número, una mayúscula y un caracter especial." required>
                                        <small>@error('password') {{$message}} @enderror</small>
                                        </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Confirma contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                        <small>@error('password') {{$message}} @enderror</small>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputFechaNac">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Date of Birth" value="{{old('fecha_nacimiento')}}"required>
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4">
                                    <label for="">Sexo</label>
                                    <select class="custom-select" name="sexo" >
                                        <option selected value="0">Seleccionar</option>
                                        <option value="h">Hombre</option>
                                        <option value="m">Mujer</option>
                                    </select>
                                    <small ></small>
            
                                </div>
                                
                                <!--<div class="form-group">
                                    <label for="imagen_de_perfil">Tu foto de perfil</label>
                                    <input type="file" class="form-control-file" name="avatar">
                                    <small>@--error('avatar') {{--$message--}} @--enderror</small>
                                </div>-->
                                
                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-9 mb-0 mb-md-4 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="tyc_check">
                                        <label class="form-check-label"  for="invalidCheck">
                                            Acepto los <a href="#" class="subrayado">términos y condiciones</a> y la <a href="#" class="subrayado">política de privacidad</a>.
                                        </label>
                                        <small>@error('tyc-check') {{$message}} @enderror</small>
                                    </div>
                                </div>
                                
                                <div class="col-12 ">
                                    <!--
                                        <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                    -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                                        Registrarme
                                    </button>
                                    
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content text-center">
                                                <div class="modal-header">
                                                    <h5 class="modal-title d-block color-verde w-100" id="exampleModalLabel">¡Ya casi estamos!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Elegí tus áreas favoritas para personalizar tu experiencia y ofrecerte desafíos acordes a tus intereses regularmente.
                                                    
                                                    <div class="seleccion-intereses d-flex flex-column flex-md-row">
                                                        
                                                        <input type="checkbox" id="myCheckbox1" name="intereses[]" value="diseno_y_arte"/>
                                                        <label for="myCheckbox1">
                                                            <img src="img/categoria-diseno.jpg"><p class="mt-2">Diseño y Arte</p>
                                                        </label>
                                                        
                                                        <input type="checkbox" id="myCheckbox2"  name="intereses[]" value="fotografia" />
                                                        <label for="myCheckbox2">
                                                            <img src="img/categoria-fotografia.jpg"><p class="mt-2">Fotografía</p>
                                                        </label>
                                                        
                                                        <input type="checkbox" id="myCheckbox3" name="intereses[]" value="programacion_y_logica"/>
                                                        <label for="myCheckbox3">
                                                            <img src="img/categoria-programacion.jpg"><p class="mt-2">Programación y Lógica</p>
                                                        </label>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer mt-5">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Volver atrás</button>
                                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarme</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
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
                </script>
@endsection