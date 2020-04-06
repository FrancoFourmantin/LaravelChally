@extends('layouts/plantilla-header') @section('title' , 'Editar perfil') @section('clases-body' , 'animated fadeIn') @section('main')

<div class="bg-gris-claro">

    <form id="edicion-perfil" class="w-100 needs-validation" method="POST" action="/editar-perfil/modificar" enctype="multipart/form-data">
        @csrf
        <section class="container px-5">

            <div class="row d-flex align-items-start  flex-wrap">
                <div class="col-12">
                    <p class="color-verde text-left mt-3 mb-1 mx-0"><a class="color-verde" href="/usuario/{{Auth::user()->username}}"><i class="fas fa-arrow-left color-verde"></i>&nbsp;Volver a tu perfil</p></a>
                    <h3 class="color-verde text-left mb-3 mx-0"><a href="../feed"></a>Editar perfil</h3>
                    <hr>
                </div>


                
                <div class="col-12 col-md-4 shadow contacto-form px-4 py-3 d-flex flex-column my-3">

                        <h3 class="color-verde text-left mb-3 mx-0">Datos Personales</h3>

                        <input type="hidden" value="{{Auth::user()->id_usuario}}" name="id_usuario">


                        <div class="form-row">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-2 ">
                                <div class="form-group">
                                    <label for="inputName">Tu nombre</label>
                                    <input type="text" class="form-control is-valid" name="nombre" id="nombre" value='{{Auth::user()->nombre}}' required>
                                    <small class="invalid-feedback">Debés colocar tu nombre</small>

                                    <small class="error">@error('nombre') {{$message}} @enderror</small>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-2 ">
                                <div class="form-group">
                                    <label for="inputName">Tu Apellido</label>
                                    <input type="text" class="form-control is-valid" name="apellido" id="apellido" value="{{Auth::user()->apellido}}" required>
                                    <small class="invalid-feedback">Debés colocar tu apellido</small>

                                    <small class="error">@error('apellido') {{$message}} @enderror</small>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12  mb-0 mb-md-2 ">
                                <div class="form-group">
                                    <label for="inputName">Nombre de usuario</label>
                                    <input type="text" class="form-control" name="username" id="inputName" data-toggle="tooltip" data-placement="top" title="Test" value="{{Auth::user()->username}}" disabled>
                                    <small class="text-muted">Este dato no se puede modificar</small>

                                </div>
                            </div>

                            <div class="col-12  mb-0 mb-md-2 ">
                                <div class="form-group">
                                    <label for="inputFechaNac">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="inputFechaNac" name="fecha_nacimiento" value="{{Auth::user()->fecha_nacimiento}}" placeholder="Date of Birth" required disabled>
                                    <small class="text-muted">Este dato no se puede modificar</small>
                                </div>
                            </div>

                            <div class="col-12  mb-0 mb-md-4">
                                <label for="">Sexo</label>
                                <select class="custom-select" disabled>
                                    <option value="h" {{ Auth::user()->sexo == 'h' ? 'selected' : '' }}>Hombre</option>
                                    <option value="m" {{ Auth::user()->sexo == 'f' ? 'selected' : '' }}>Mujer</option>
                                </select>
                                <small class="text-muted">Este dato no se puede modificar</small>
                            </div>

                            <button type="button" id="boton-modificar-password" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i> Modificar mail y contraseña</button>


                            <div class="col-12 d-none modificar-datos-personales opacity-0">
                                <div class="row">

                                    <div class="col-12  mb-0 mb-md-2 ">
                                        <div class="form-group">
                                            <label for="inputMail">Tu mail</label>
                                            <input type="email" class="form-control is-valid" name="email" id="email" value="{{Auth::user()->email}}" required>
                                            <small class="error">@error('email') {{$message}} @enderror</small>
                                        </div>
                                    </div>
    
                                    <div class="col-12  mb-0 mb-md-2">
                                        <div class="form-group">
                                            <label for="inputMail">Confirmación de mail</label>
                                            <input type="email" class="form-control is-valid" name="email_confirmation" id="email-confirmacion" value="{{Auth::user()->email}}" id="inputMail" required>
                                            <small class="error">@error('email') {{$message}} @enderror</small>
                                        </div>
                                    </div>
    
                                    <div class="col-12  mb-0 mb-md-2 ">
                                        <div class="form-group">
    
                                            <!-- DEBERIA HACER UNA FUNCION APARTE PARA LA CONTRASEÑA Y QUE SEA OPCIONAL; ES DECIR QUE SI ESTA VACIO NO PASE NADA -->
                                            <label for="inputPassword">Nueva contraseña
                                                <a href="http://" target="_blank" rel="noopener noreferrer"></a>
                                            </label>
                                            <input type="password" class="form-control" name="password" id="password">
                                            <small class="error invalid-feedback">@error('password') {{$message}} @enderror</small>
                                        </div>
                                    </div>
    
                                    <div class="col-12  mb-0 mb-md-2 ">
                                        <div class="form-group">
                                            <label for="inputPassword">Confirmación de contraseña
                                                <a href="http://" target="_blank" rel="noopener noreferrer"></a>
                                            </label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password-confirmacion">
                                            <small class="error invalid-feedback">@error('password') {{$message}} @enderror</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                        

                        </div>
                </div>

                <div class="col-12 offset-md-1 col-md-7 shadow contacto-form px-4 py-3 d-flex flex-column my-3">

                        <h3 class="color-verde text-left mb-3 mx-0 ">Personalizá tu perfil</h3>

                        <input type="hidden" value="{{Auth::user()->id_usuario}}" name="id_usuario">


                        <p class="font-weight-bold">Foto de perfil</p>
                        <div class="d-flex flex-row align-items-center justify-content-between">

                            <div class="text-center">
                                <div class="mini-contenedor-foto">
                                    <img class="img-fluid" id="outputAvatar" src='{{asset ('avatars/'.Auth::user()->avatar)}}' alt="avatar">
                                </div>
                            </div>
    
    
                            <div class="form-group">
                                <label for="file1">Cambiar</label>
                                <input type="file" class="form-control-file" name="avatar" id="campo-avatar">
                                <small class="error">@error('avatar') {{$message}} @enderror</small>
                            </div>

                        </div>

                        <hr>

                        <p class="font-weight-bold">Foto de portada</p>
      
                        <div class="text-center">
                                <img class="img-fluid" id="outputCover" src='{{asset ('covers/'.Auth::user()->cover)}}' alt="cover">
                        </div>


                        <div class="form-group">
                            <label for="file2">Cambiar portada</label>
                            <input type="file" class="form-control-file" name="cover" id="campo-cover">
                            <small class="error">@error('cover') {{$message}} @enderror</small>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="font-weight-bold" for="exampleFormControlTextarea1">Tu bio</label>
                            <textarea name="bio" maxlength="1000" class="form-control is-valid" id="bio" rows="5">{{Auth::user()->bio}}</textarea>
                            <small> </small>
                            <small class="error">@error('bio') {{$message}} @enderror</small>
                        </div>

                        <hr>

                        <p class="font-weight-bold">Vinculá tu perfil a otras redes</p>

                        <div class="form-group mb-md-4">
                                <label for="">Tu usuario de LinkedIn</label>
                                <div class="input-group d-flex flex-row align-items-center">
                                    <i class="fab fa-linkedin-in mr-3 texto-grande"></i>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupPrepend">linkedin.com/in/</span>
                                    </div>
                                    <input type="text" class="form-control is-valid" placeholder="Tu usuario de LinkedIn" name="link_linkedin" id="campo-linkedin"  value="{{Auth::user()->link_linkedin}}">
                                    <small class="invalid-feedback"></small>
                                </div>


                        </div>

                        <div class="form-group mb-md-4">

                                <label for="">Tu usuario de Behance</label>
                                <div class="input-group d-flex flex-row align-items-center">
                                    <i class="fab fa-behance mr-3 texto-grande"></i>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupPrepend">behance.net/</span>
                                    </div>
                                    <input type="text" class="form-control is-valid" name="link_behance" id="campo-behance" value="{{Auth::user()->link_behance}}">
                                    <small class="invalid-feedback"></small>
                                </div>





                        </div>

                        <div class="form-group mb-md-4">
                                <label for="">Tu usuario de GitHub</label>
                                <div class="input-group d-flex flex-row align-items-center">
                                    <i class="fab fa-github mr-3 texto-grande"></i>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroupPrepend">github.com/</span>
                                    </div>
                                    <input type="text" class="form-control is-valid" name="link_github" id="campo-github"  value="{{Auth::user()->link_github}}">
                                    <small class="invalid-feedback"></small>
                                </div>



                        </div>

                        <div class="form-group mb-md-4">
                                <label for="">Tu Sitio Web</label>
                                <div class="d-flex flex-row align-items-center">
                                    <i class="fas fa-globe-americas mr-3 texto-grande"></i>
                                    <input type="text" class="form-control is-valid" name="link_website" id="campo-website"  value="{{Auth::user()->link_website}}">
                                    <small class="invalid-feedback"></small>
                               </div>
                        </div>




                        <div class="form-row">


                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">
                                <!--
                                    <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                -->
                                <div class="col-12 d-flex justify-content-between m-0 p-0">

                                    <button type="submit" class="btn btn-secondary" >
                                        Modificar datos
                                    </button>
                                </div>


                            </div>

                        </div>
                </div>







            </div>    

        </section>
    </form>

    </div>

    <script>
    validarModificacionDePerfil();
    </script>

    @endsection