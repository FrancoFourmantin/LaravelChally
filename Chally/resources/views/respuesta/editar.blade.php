@extends('layouts/plantilla-header')
@section('title' , 'Editar posteo')
@section('clases-body' , 'animated fadeIn')

@section('main')

    <div class="bg-gris">


        <section class="container-fluid px-5">
            <div class="row d-flex align-items-center justify-content-center  flex-wrap">



                <div class="col-12 col-sm-12 col-md-8 col-lg-5 shadow contacto-form px-5 py-3 d-flex flex-column my-3">
                    <p class="color-verde text-left mb-3 mx-0"><a class="color-verde" href="/desafio/ver/{{$respuesta->id_desafio}}"><i class="fas fa-arrow-left color-verde"></i>&nbsp;Volver al desafío</a></p>
                    <h3 class="color-verde text-left mb-3 mx-0"><a href="../feed"></a> Editá tu solución</h3>

                    <form class="w-100 needs-validation" method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">

                            <div class="col-12  mb-0 mb-md-4 ">



                                <div class="form-group">
                                    <label for="descripcion" class="font-weight-bold">Descripción de tu solución</label>
                                    <br><small>Describí lo que hiciste</small>

                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5" >{{$respuesta->descripcion}}</textarea>
                                    <small class="text-danger"> @error ('descripcion') {{$message}} @enderror </small>
                                </div>

                                <div class="custom-file form-group my-3">

                                    <label class="font-weight-bold" for="inputGroupFile01">Archivo adjunto</label> <br>
                                    <small>Adjuntá una imagen, PDF o RAR con tu solución</small>

                                    <input type="file" id="inputGroupFile01" class="form-control-file" name="archivo" value="{{old('imagen')}}">
                                    <small class="text-danger"> @error ('imagen') {{$message}} @enderror </small>

                                </div>
                                <img class="img-fluid" src="{{asset('respuestas/' . $respuesta->archivo)}}" alt="">

                                <input name="id_respuesta" type="hidden" value="{{$respuesta->id}}">






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