<!--<?php/*
require_once('config.php');

session_start();
//SI EXISTE LA COOKIE, LA USA PARA CARGAR LA SESIÓN
if(isset($_COOKIE["email"])) {
    crearSesionConCookies();
}


//SI LA SESIÓN ESTÁ INICIADA NO SE PUEDE ACCEDER AL REGISTRO
if(isset($_SESSION["email"])) {
    header("location:feed.php");
}


// 1) Verifico si estamos en Post
if($_POST){

    // 2) Creo la instancia con todos los datos (por mas que estos sean erróneos)
    $nuevoUsuario = new Usuario($_POST['name'],$_POST['lastname'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['birth'],$_POST['sex'],$_FILES['avatar']);

    // 3) Hago el método de validación y almaceno los potenciales errores en un array llamado $errores
    $errores = $nuevoUsuario->validarRegistro();

    //var_dump($errores);

    // 4) Si el array de errores está vacío...
    if(!$errores){

        // 5) Guardo el usuario en la base de datos
        Usuario::saveUsuario($nuevoUsuario);

        // 6) Creo la sesión 
        Usuario::crearSesion($nuevoUsuario);
        header('location:processing.php');


    }
}
    
    */
    ?>-->
    
    @extends('layouts/plantilla-header')
    @section('title' , 'Registro Chally')
    @section('clases-body' , 'animated fadeIn')
    
    @section('main')
    
        <div class="contenedor-registro">
            
            <section class="container-fluid px-5">
                <div class="row d-flex align-items-center justify-content-center vh-100 flex-wrap">
                    
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column align-items-center my-5">
                        <a href="index.php"><img  src="img/logo_c.svg" class="logo" alt=""></a>
                        <h3 class="color-verde text-center mb-5 ">Registro</h3>
                        <form class="w-100 needs-validation" method="POST" action="registro.php" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu nombre</label>
                                        <input type="text" class="form-control" name="name" required value="<?php if($_POST){
                                            echo $nuevoUsuario->getNombre(); } ?>">
                                        <small><?php if($_POST && isset($errores['name'])) {echo $errores['name']; } ?></small>

                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Tu Apellido</label>
                                        <input type="text" class="form-control" name="lastname" value="<?php if($_POST){
                                            echo $nuevoUsuario->getApellido(); } ?>" required>
                                        <small><?php if($_POST && isset($errores['lastname'])) {echo $errores['lastname']; } ?></small>

                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputName">Nombre de usuario</label>
                                        <input type="text" class="form-control" name="username" value="<?php if($_POST){
                                            echo $nuevoUsuario->getUsername(); } ?>" required>
                                        <small><?php if($_POST && isset($errores['username'])) {echo $errores['username']; } ?></small>
                                      
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputMail">Tu mail</label>
                                        <input type="email" class="form-control " name="email" value="<?php if($_POST){
                                            echo $nuevoUsuario->getMail(); } ?>" required>
                                            
                                           <small><?php if($_POST && isset($errores['email'])) {echo $errores['email']; } ?></small>

                                        </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6   mb-0 mb-md-4">
                                    <div class="form-group">
                                        <label for="inputMail">Confirmacion mail</label>
                                        <input type="email" class="form-control " name="validacion_email" value="<?php if($_POST){
                                            echo $nuevoUsuario->getMail(); } ?>" required>
                                        </div>
                                        <small></small>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control " name="password" data-toggle="tooltip" data-placement="bottom" title="Mínimo de 8 caracteres, un número, una mayúscula y un caracter especial." required>
                                        <small><?php if($_POST && isset($errores['password'])) {echo $errores['password']; } ?></small>
                                        </div>
                                </div>
                                
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputPassword">Confirma contraseña<a href="http://" target="_blank" rel="noopener noreferrer"></a></label>
                                        <input type="password" class="form-control" name="confirm-password" required>
                                        <small><?php if($_POST && isset($errores['confirm-password'])) {echo $errores['confirm-password']; } ?></small>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4 ">
                                    <div class="form-group">
                                        <label for="inputFechaNac">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" name="birth" placeholder="Date of Birth" value="<?php if($_POST){
                                            echo $nuevoUsuario->getFecha_nacimiento(); } ?>"required>
                                    </div>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6  mb-0 mb-md-4">
                                    <label for="">Sexo</label>
                                    <select class="custom-select" name="sex" value="" >
                                        <option selected>Seleccionar</option>
                                        <option value="h" <?php if($_POST) {
                                            if($nuevoUsuario->getSexo() == "h"){
                                                echo "selected";
                                            }
                                            }?>>Hombre</option>

                                        <option value="m" <?php if($_POST) {
                                            if($nuevoUsuario->getSexo() == "m"){
                                                echo "selected";
                                            }
                                            }?>>Mujer</option>
                                    </select>
                                    <small ></small>
            
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Tu foto de perfil</label>
                                    <input type="file" class="form-control-file" name="avatar">
                                    <small><?php if($_POST && isset($errores['avatar'])) {echo $errores['avatar']; } ?></small>
               
                                </div>
                                
                                
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-9 mb-0 mb-md-4 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="tyc_check" <?php if(isset($_POST['tyc_check'])){
                                            echo "checked";}?>>
                                        <label class="form-check-label"  for="invalidCheck">
                                            Acepto los <a href="#" class="subrayado">términos y condiciones</a> y la <a href="#" class="subrayado">política de privacidad</a>.
                                        </label>
                                        <small></small>
                                        <small></small>
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
                                                        
                                                        <input type="checkbox" id="myCheckbox1" name="diseno_y_arte" <?php if(isset($_POST['diseno_y_arte'])){echo "checked";}?>  />
                                                        <label for="myCheckbox1">
                                                            <img src="img/categoria-diseno.jpg"><p class="mt-2">Diseño y Arte</p>
                                                        </label>
                                                        
                                                        <input type="checkbox" id="myCheckbox2"  name="fotografia" <?php if(isset($_POST['fotografia'])){echo "checked";}?>  />
                                                        <label for="myCheckbox2">
                                                            <img src="img/categoria-fotografia.jpg"><p class="mt-2">Fotografía</p>
                                                        </label>
                                                        
                                                        <input type="checkbox" id="myCheckbox3" name="programacion_y_logica" <?php if(isset($_POST['programacion_y_logica'])){echo "checked";}?> />
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