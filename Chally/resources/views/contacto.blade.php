@extends('layouts/plantilla-header')
@section('title' , 'Contactanos')
@section('clases-body' , 'animated fadeIn')

@section('main')

<div class="contenedor-perfil">        
    <section class="container-fluid">
        <div class="row d-flex align-items-center vh-100 flex-wrap py-5 pr-5">
            <div class="d-none d-sm-none d-md-flex d-lg-flex  col-sm-7 col-md-7 col-lg-8">
            </div>
            
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 shadow contacto-form px-5 py-3    d-flex flex-column align-items-center">
                <a href="index.php"><img class="mb-4" src="img/logo_c.svg" class="logo" alt=""></a>
                <h3 class="color-verde text-center mb-4">Contactanos</h3>
                <form class="w-100">
                    
                    <div class="form-group" method="POST" action="register.php">
                        <label for="inputName">Tu nombre y Apellido</label>
                        <input type="text" class="form-control" id="inputName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputMail">Tu mail</label>
                        <input type="email" class="form-control" id="inputMail" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Motivo</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Consulta</option>
                            <option>Reporte</option>
                            <option>Publicidad</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputConsulta">Dejanos tu consulta:</label>
                        <textarea class="form-control" id="inputConsulta" rows="3" required></textarea>
                        <!-- <input type="" class="form-control" id="inputConsulta" required> -->
                    </div>
                    
                    
                    <a class="btn btn-secondary w-100" href="#" role="button">Avanzar</a>
                </form>                
            </div>
        </section>    
    </div>
    @endsection