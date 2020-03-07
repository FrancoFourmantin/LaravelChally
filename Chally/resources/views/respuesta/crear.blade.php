@extends('layouts/plantilla-header')
@section('title' , 'Enviar respuesta al desafío')
@section('clases-body' , 'animated fadeIn')

@section('main')

    <div class="bg-gris">


        <section class="container px-5">
            <div class="row align-items-start">

                <div class="col-5">

                    <div class="seccion-derecha my-3">
                        <!--Menu para elegir vista de posteos-->
                        <!--Fin menu para elegir vista de posteos-->
        
                        <div class="row">
                            <div class="col-12">
        
                                <div class="card mb-5">
        
                                    <div class="card-contenido">
                                        <div class="row">
        
        
                                            <div class="row card-content-attached">

        
                                                <div class="col-12">
                                                    <p class="color-verde text-left mb-3 mx-0"><a href="../feed" class="color-verde"><i class="fas fa-arrow-left color-verde"></i>&nbsp;Volver al desafío</a></p>

                                                    <h2>Resumen del desafío</h2>
                                                    <h4 class="ml-0 color-verde mb-3">{{$desafio->nombre}}</h4>
        
                                                    <hr>
        
                                                    <h5>Descripción</h5>
                                                <p><?php echo nl2br($desafio->descripcion) ?></p>
        
                                                    <hr>
        
                                                    <h5>Requisitos y Condiciones</h5>
                                                    <ul class="requisitos">
                                                        <!--<li><i class="fas fa-check color-verde"></i></i> &nbsp;La landing page no necesariamente debe estar programada</li>-->
                                                        <p><?php echo nl2br($desafio->requisitos) ?></p>
                                                    </ul>
        
                                                </div>
                                            </div>
        
                                        </div>
        
                                    </div>

        
        
        
        
        
                                </div> <!-- CIERRE CARD -->
        
        
        
                                <hr>
        
                                                                                                        
                            </div>
                        </div>

        
                    </div>
        
                </div>






                    <div class="col-12 col-sm-12 col-md-8 col-lg-7 shadow contacto-form px-5 py-3 d-flex flex-column my-3">
                        <h3 class="color-verde text-left mb-3 mx-0"><a href="../feed"></a>Enviar solución</h3>

                        <form class="w-100 needs-validation" method="POST" action="crear" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">

                                <div class="col-12  mb-0 mb-md-4 ">



                                    <div class="form-group">
                                        <label for="descripcion" class="font-weight-bold">Descripción de tu solución</label>
                                        <br><small>Describí lo que hiciste</small>

                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="5" >{{old('descripcion')}}</textarea>
                                        <small class="text-danger"> @error ('descripcion') {{$message}} @enderror </small>
                                    </div>

                                    <div class="custom-file form-group my-3">
                                        <label class="font-weight-bold" for="inputGroupFile01">Archivo adjunto</label> <br>
                                        <small>Adjuntá una imagen, PDF o RAR con tu solución</small>

                                        <input type="file" id="inputGroupFile01" class="form-control-file" name="archivo" value="{{old('imagen')}}">
                                        <small class="text-danger"> @error ('imagen') {{$message}} @enderror </small>
                                    </div>

                                    <input name="id_desafio" type="hidden" value="{{$desafio->id}}">






                                </div>









                                    <!--
                                        <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                                    -->
                                    <div class="col-12 d-flex justify-content-between mt-3 p-0">
                                        
                                        <button type="submit" class="btn btn-secondary">
                                            Publicar solución
                                        </button>
                                    </div>


                        </form>
                    </div>
            </div>
        </section>

    </div>

@endsection