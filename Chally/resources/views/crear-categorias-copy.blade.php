@extends('layouts/header-no-footer')
@section('title' , 'Categorias')
@section('clases-body' , '')

@section('main')

               <!-- Modal -->
               <div class="modal fade text-body" id="eliminar-categoria" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Eliminar categoria</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <strong>Cuidado!</strong> Va a eliminar una categoria que puede contener desafios asociada a ella. 
                      Eliminar la cateogria sin deshabilitar los desafios implica que los mismos que se quedaran con categoria "Varios".
                      ¿Desea deshabilitar todos los desafios que contenga la categoria?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">
                        &nbsp;Cancelar</button>
                                                            
                      </div>
                    </div>
                  </div>
                </div>
                {{-- Fin del modal --}}





<div class="contenedor-categorias container-fluid">      
    <form class="form-categorias mt-3" action="agregarCategoria" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row"> {{--Contenedor pagina--}}
                <div class="col-6">  
                    <div class="row"> {{--Contenedor categorias--}}
                        @foreach($categorias as $categoria)
                        <div class="col-6 mb-5">
                            <div class="ml-3 categoria-contenedor border p-3">
                                <div class="d-flex align-items-center titulo-categoria">
                                    <h3 class="mr-auto">{{$categoria->nombre}}</h3>
                                    <input type="checkbox" hidden value="{{$categoria->id}}" name="categoriaSeleccionada[]">
                                </div>
                                @if(count($categoria->descendants)>= 1)
                                <ul class="list-group">
                                    @foreach ($categoria->descendants as $categoriaHijo)
                                    <li class="categoria-item border-bottom rounded d-flex my-1 ml-5 p-3">
                                        <strong class="mx-5">{{$categoriaHijo->nombre}}</strong>
                                        <input type="checkbox" hidden name="categoriaSeleccionada[]" value="{{$categoriaHijo->id}}">
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <li class="categoria-item  d-flex my-1 ml-5 p-3">
                                    Todavia no tiene subcategorias!
                                </li>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        
                    </div> {{--Fin contenedor categorias--}}
                </div>
                
                <div class="col-6">
                    <div class="container">
                        <div class="contenedor-form d-flex flex-column">
                            <div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Nombre</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nueva categoria" name="nuevaCategoria">
                                    <button name="submit" type="submit" value="agregar" class="ml-3 btn btn-success">Agregar categoria</button>
                                  </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <label for="submit">Eliminar las categorias seleccionadas</label>
                                    <a class="btn btn-secondary d-inline p-2" href="#" role="button"data-toggle="modal" data-target="#eliminar-categoria">Eliminar</a>
                                    <button name="submit" type="submit" value="eliminar" class="ml-auto btn btn-danger">Eliminar categorias</button>
                                </div>
                                
                            </div>
                        </div>
                        <small class="text-danger">@error('nuevaCategoria') {{$message}} @enderror</small>
                        <small class="text-danger">@error('categoriaSeleccionada') {{$message}} @enderror</small>
                    </div>
                </div>


            </div>{{--Fin contenedor pagina--}}
        </div>
        
    </form>
    
</div>

<script>
    let itemCategoria = document.querySelectorAll(".categoria-item");
    let tituloCategoria = document.querySelectorAll(".titulo-categoria");
    let iconoCheked  = `<i class="fas fa-check"></i>`;
    
    function seleccionarTituloCategoria(event){
        const tituloClickeado = event.currentTarget;
        let checkbox = tituloClickeado.querySelector("input");
        if(checkbox.checked == true){
            let iconoChecked = tituloClickeado.querySelector("i");
            checkbox.checked = false;
            iconoChecked.remove();
            
        }else{
            tituloClickeado.insertAdjacentHTML("beforeend" , iconoCheked);
            // let checked = document.createAttribute("checked");
            checkbox.checked = true;
        }
    }
    
    tituloCategoria.forEach(titulo => titulo.addEventListener("click" , seleccionarTituloCategoria));
    
    
    
    function seleccionarCategoria(event){
        const categoriaClickeada = event.currentTarget;
        //Seleccionamos el checkbox de la categoria
        let checkbox = categoriaClickeada.querySelector("input");
        
        //Si existe el campo checked significa que previamente hizo click y quiere desclickear
        if(checkbox.checked == true){
            checkbox.checked = false;
            categoriaClickeada.classList.remove("bg-success");
        }else{
            // let checked = document.createAttribute("checked");
            checkbox.checked = true;
            categoriaClickeada.classList.add("bg-success");
        }
    }
    
    itemCategoria.forEach(categoria => categoria.addEventListener("click" , seleccionarCategoria));
    
</script>
@endsection