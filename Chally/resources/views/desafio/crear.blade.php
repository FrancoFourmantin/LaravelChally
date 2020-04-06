@extends('layouts/plantilla-header')
@section('title' , 'Crear posteo')
@section('clases-body' , 'animated fadeIn')

@section('main')
<form class="w-100 needs-validation" method="POST" action="crear" id="nuevoDesafio" enctype="multipart/form-data">
    @csrf
    <div class="bg-gris-claro">


        <section class="container pt-1 pb-4">
            <div class="row align-items-start">

                <div class="col-12">
                    <p class="color-verde text-left mt-3 mb-1 mx-0"><a href="../feed"><i class="fas fa-arrow-left color-verde"></i></a>&nbsp;Volver atrás</p>
                    <h3 class="color-verde text-left mb-3 mx-0"><a href="../feed"></a> Nuevo Desafío</h3>
                    <hr>
                </div>


                <div class="col-12 col-md-8 col-lg-5 shadow contacto-form px-3 py-3 my-3 d-flex flex-row align-items-start">




                        <div class="form-row">

                            <div class="col-12  mb-0 mb-md-4 ">

                                <h4 class="ml-0 color-verde">Datos iniciales del desafío</h4>

                                <div class="form-group">
                                    <label class="font-weight-bold" for="inputName">Título del Desafío</label>
                                    <input type="text" class="form-control @error ('nombre') is-invalid @enderror" name="nombre" id="inputName" value="{{old('nombre')}}" placeholder="Diseñá un ícono de cultura pop con onda vaporwave" inputName = "Título del Desafío">
                                    <small class="d-none invalid-feedback"></small>
                                    <small class="text-danger"> @error ('nombre') {{$message}} @enderror </small>
                                </div>


                                <div class="form-group mt-4">
                                    <label for="categoria" class="font-weight-bold">Categoría</label>
                                    <select class="form-control @error ('categoria') is-invalid @enderror" name="id_categoria" id="categoria" inputName = "Categoría Principal">
                                        
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}" {{ old('id_categoria') == "0" ? "selected" : ""}}>{{$categoria->nombre}}</option>
                                        @endforeach


                                    </select>
                                    <small class="d-none invalid-feedback">¡Debés seleccionar una categoría válida!</small>

                                    <??>
                            </div>
                            
                                <small class="text-danger"> @error ('id_subcategoria') {{$message}} @enderror </small>

                            <div class="form-group mt-4">
                                    <label for="subcategoria" class="font-weight-bold">Subcategoría</label>
                                    <select class="form-control" name="id_subcategoria" id="subcategoria" inputName = "Subcategoría">
 
                                    </select>
                                    <small class="d-none invalid-feedback">¡Debés seleccionar una subcategoría válida!</small>

                                    <??>
                            </div>
                                <small class="text-danger"> @error ('id_subcategoria') {{$message}} @enderror </small>


                                <div class="custom-file form-group my-3">
                                    <label class="font-weight-bold" for="inputGroupFile01">Foto del desafío</label>
                                    <input type="file" id="inputGroupFile01" class="form-control-file" name="imagen" value="{{old('imagen')}}">
                                    <img class="img-fluid opacity-0" id="output">

                                    <small>¡Una foto atractiva hará que más gente se interese en tu desafío! (Tamaño recomendado: 1000x1000px)</small>
                                    <small class="text-danger"> @error ('imagen') {{$message}} @enderror </small>
                                </div>

                            </div>

                </div>
            </div>


            <div class="col-12 col-md-8 offset-lg-1 col-lg-6 shadow contacto-form px-4 py-3 my-3 opacity-0" id="step-2">


                    <div class="form-row">

                        <div class="col-12  mb-0 mb-md-4 ">

                            <h4 class="ml-0 color-verde">Detalles del desafío</h4>

                            <div class="form-group">
                                <label for="descripcion" class="font-weight-bold ">Resumen del Desafío</label>
                                <textarea placeholder="En este desafío vas a poner a prueba tu creatividad y tus habilidades en fotomontaje para componer una imagen de un ícono de la cultura pop nacional." class="form-control @error ('descripcion') is-invalid @enderror" name="descripcion" inputName = "Descripción" id="descripcion" rows="2" >{{old('descripcion')}}</textarea>
                                <small class="d-none invalid-feedback">¡Ups, la descripción es muy corta! Debe tener un mínimo de 30 caracteres.</small>
                                <small>Describí el desafío lo mejor posible en pocas palabras</small>
                                <small class="text-danger"> @error ('descripcion') {{$message}} @enderror </small>
                            </div>

                            <div class="form-group requisitos">
                                <label for="requisitos" class="font-weight-bold">Requisitos y Reglas del Desafío</label>
                                <input class="form-control mb-2" name="requisitos-01" id="requisitos-01" type="text" placeholder="Ejemplo: La imagen debe ser en formato cuadrado">
                                <input class="form-control mb-2 d-none" name="requisitos-02" id="requisitos-02" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-03" id="requisitos-03" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-04" id="requisitos-04" type="text" >
                                <input class="form-control mb-2 d-none" name="requisitos-05" id="requisitos-05" type="text" >


                                <button type="button" class="btn btn-sm btn-success" id="addMore"><i class="fas fa-plus"></i> Agregar más requisitos </button>
                                <br>
                                <small>Mínimo:1 Requisito | Máximo: 5 Requisitos</small>
                            </div>



                            <div class="form-group mt-4">
                                <label for="dificultad" class="font-weight-bold">Nivel de Dificultad</label>
                                <select class="form-control @error ('dificultad') is-invalid @enderror" name="dificultad" id="dificultad" inputName ="Dificultad">
                                    <option value="0" {{ old('dificultad') == "0" ? "selected" : ""}} >Selecciona una opción</option>
                                    <option value="1" {{ old('dificultad') == "1" ? "selected" : ""}} >Muy fácil</option>
                                    <option value="2" {{ old('dificultad') == "2" ? "selected" : ""}}>Fácil</option>
                                    <option value="3" {{ old('dificultad') == "3" ? "selected" : ""}}>Intermedio</option>
                                    <option value="4" {{ old('dificultad') == "4" ? "selected" : ""}} >Difícil</option>
                                    <option value="5" {{ old('dificultad') == "5" ? "selected" : ""}}>Experto</option>
                                </select>
                                <small class="d-none invalid-feedback">Debés elegir una dificultad de la lista</small>

                            </div>
                            <small class="text-danger"> @error ('dificultad') {{$message}} @enderror </small>


                            <div class="form-group mt-4">
                                <label class="font-weight-bold" for="fechaLimite">Fecha Límite de envío de respuestas</label>
                                <select class="form-control @error ('fecha_limite') is-invalid @enderror" name="fecha_limite" id="fechaLimite" inputName="Fecha Límite">
                                    <option value="0" {{ old('fecha_limite') == "0" ? "selected" : ""}}  >Selecciona una opción</option>
                                    <option value="7" {{ old('fecha_limite') == "7" ? "selected" : ""}}  >Una semana</option>
                                    <option value="14" {{ old('fecha_limite') == "14" ? "selected" : ""}}>Dos semanas</option>
                                    <option value="30" {{ old('fecha_limite') == "30" ? "selected" : ""}}>Un mes</option>
                                </select>
                                <small class="d-none invalid-feedback">Debés elegir el tiempo de expiración del desafío</small>

                                <small class="text-danger"> @error ('fecha_limite') {{$message}} @enderror </small>

                            </div>

                            <input name="requisitos" id="requisitos" value="" type="hidden">
                            <small class="text-danger"> @error ('requisitos') {{$message}} @enderror </small>




                        </div>









                        <div class="col-6 col-sm-6 col-md-6 col-lg-12 ">
                            <!--
                                <button class="btn btn-secondary float-right     mt-1" type="submit">Registrarse</button>
                            -->
                            <div class="col-12 d-flex justify-content-between m-0 p-0">

                                <button type="submit" class="btn btn-dark" disabled>
                                    Publicar Desafío
                                </button>
                            </div>


                        </div>
                        
            </div>



                



                
            </div>

        </section>

    </div>
</form>

<script>
    validarCreacionDesafio();
</script>
@endsection