<!--<?php /* 

require_once('funciones.php');


if($_GET){
    if(isset($_GET)){
        $infoUsuario = buscarUsuario("email" , $_GET['email']);
        if ($infoUsuario == false){
            $errores['email'] = "Este mail no existe en la base de datos";
        }else{
            $mostrar_form_codigo = "d-block";
            $ocultar_form_codigo = "d-none";
            $codigo = 1234;
            //$mensaje = "Hola" . $infoUsuario["name"] . "vemos que has olvidado tu contraseña aqui te mandamos este codigo: $codigo para que te hagas otra de nuevo ";
            //mail($infoUsuario['email'] , "Recuperar contraseña CHALLY" , $mensaje );
        }
    }
}



if($_POST){
    if(isset($_POST)){

        
        if($codigo != $_POST['codigo_mail']){
            $errores['codigo_mail'] = "El codigo ingresado es incorrecto";
        }else{
            // CAMPO CONTRASEÑA
            $password = trim($_POST['password']);
            // si está vacío
            if($password == "" ) {
                // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
                $errores['password'] = "La contraseña es obligatoria";
            }else{
                $uppercase = preg_match('@[A-Z]@', $_POST['password']);
                $lowercase = preg_match('@[a-z]@', $_POST['password']);
                $number    = preg_match('@[0-9]@', $_POST['password']);
                $specialChars = preg_match('@[^\w]@', $_POST['password']);
                // si tiene una longitud menos a 6
                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
                    // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
                    $errores['password'] = "La contraseña debe tener al menos 8 caracteres de longitud y debe incluir al menos una letra mayúscula, un número y un carácter especial";
                }else {
                    if ($password != $_POST['confirm-password']){
                        $errores['confirm-password'] = "Las contraseñas deben coincider";
                    }else{
                        modificarJson(password_hash($password, PASSWORD_DEFAULT), "password" , $infoUsuario['password'] , $infoUsuario['id']);
                        header('location:login.php');exit;
                    }
                }
            }
        }
        
        
        
        
    }
}
*/
?>-->



@extends('layouts/plantilla-header')
@section('title' , 'Modificar perfil')
@section('clases-body' , 'recuperar')

@section('main')

    
    <form class="ingreso-mail <?//=isset($ocultar_form_codigo) ? "$ocultar_form_codigo" : ""?>" action="#" method="GET">
        <h2>Ingrese su mail</h2>
        <input type="mail" name="email" placeholder="example@domain.com">
        <small><?//=isset($errores['email']) ? $errores['email'] : "" ?></small>
        <button class="btn btn-secondary" type="submit">Siguiente</button>
    </form>
    
    
    
    <div class="contenedor-recuperar <?//=isset($mostrar_form_codigo) ? "" : "d-none"  ?>">
        <h2 class="recuperar-title">Recuperar contraseña</h2>
        <small><?//=isset($codigo) ? $codigo : "" ?></small>

        <form action="#" class="recuperar" method="POST">
            <p class="recuperar-aviso">Te hemos mandado al mail un codigo!</p>
            
            
            <label for="mail">Aqui ingresa el codigo</label>
            <div>
                <input class="codigo_recuperacion" type="number" name="codigo_mail" minlength="4" maxlength="4" placeholder="XXXX" required> 
                <small><?//=isset($errores['codigo_mail']) ? $errores['codigo_mail'] : "" ?></small>
            </div>
            
            <label for="password">Nueva contraseña</label>
            <div>
                <input type="password" name="password">
                <small><?//=isset($errores['password']) ? $errores['password'] : "" ?></small>
            </div>
            
            
            
            <label for="confirm-password">Confirmar contraseña</label>
            <div>
                <input type="password" name="confirm-password">
                <small><?//=isset($errores['confirm-password']) ? $errores['confirm-password'] : "" ?></small>
            </div>
            
            
            
            <button class="btn btn-secondary" type="submit">Cambiar contraseña</button>
            
            
        </form>
    </div>
</body>
</html>