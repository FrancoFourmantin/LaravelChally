let inputSearch = document.querySelector('.input-search');
let tableSearch = document.querySelector('.table-search');
let formSearch = document.querySelector('.search-contenedor');

/*########Funciones para UI################*/
console.log(formSearch);
formSearch.onmouseover =  function(e){
    inputSearch.style.opacity = '1';
    inputSearch.style.width = '100%';
    inputSearch.style.border = '2px solid #1bb76e'
}

formSearch.onmouseout = function(){
    inputSearch.style.opacity = '0';
    inputSearch.style.width = '0%';
}

inputSearch.addEventListener('focus' , function(e){
    formSearch.onmouseout = function () {};
    tableSearch.style.display = "flex";
    tableSearch.style.opacity = "1";
    
    inputSearch.style.width = '100%';
    inputSearch.style.opacity = '1';
});

inputSearch.addEventListener('blur', function(e){   
    
    formSearch.onmouseout = function(){
        inputSearch.style.opacity = '0';
        inputSearch.style.width = '0%';
    }
    
    tableSearch.style.opacity = '0';
    inputSearch.style.width = '0%';
    inputSearch.style.opacity = '0';
})

tableSearch.addEventListener('click' , function(e){
    
    console.log(e);
    if(e.currentTarget.href){
        window.location.href = e.currentTarget.href;
    }
})




/*FUNCIONES PARA RESULTADOS EN TABLA*/
inputSearch.addEventListener('keypress' , (e) => {
    var busqueda = inputSearch.value;
    var nombreCategoriasResultado = document.querySelectorAll(".resultado-title");
    var tdResultados = document.querySelectorAll(".resultado-content");
    function objetoOpciones (clase,link,contenido) {
        this.clase = clase;
        this.link = link;
        this.contenido = contenido;
    };
    
    
    function armarFila(opciones){
        let fila = `
        <tr class="${opciones.clase}">
        <td><a href="${opciones.link}">${opciones.contenido}</a><td>
        </tr>
        `
        return fila;   
    }
    
    
    
    if(busqueda != ""){
        fetch( `/api/resultados/${busqueda}`)
        .then(function(response){
            tdResultados.forEach(td => {
                td.remove();
            });
            return response.json();
        })
        .then(function(data){
            tdResultados.forEach(td => {
                td.remove();
            });
            if(data.categorias){
                if(data.categorias.length > 0){
                    data.categorias.forEach(categoria => {
                        
                        var opcionesCategorias = new objetoOpciones();
                        
                        opcionesCategorias.clase = `resultado-content`;
                        opcionesCategorias.link = `/feed/categoria-${categoria.id}`;
                        opcionesCategorias.contenido = `${categoria.nombre}`;  
                        
                        
                        nombreCategoriasResultado.forEach(nombreCategoriaResultado => {
                            if(nombreCategoriaResultado.dataset.referencia === 'categorias'){
                                nombreCategoriaResultado.insertAdjacentHTML('afterend' , armarFila(opcionesCategorias)); 
                            }
                        });
                    });
                    
                }
            }
            
            if(data.usuarios){
                
                if(data.usuarios.length > 0){
                    data.usuarios.forEach(usuario => {
                        
                        var opcionesUsuarios = new objetoOpciones();
                        
                        opcionesUsuarios.clase = `resultado-content`;
                        opcionesUsuarios.link = `/usuario/${usuario.username}`;
                        opcionesUsuarios.contenido = `${usuario.nombre} ${usuario.apellido}`;
                        
                        
                        nombreCategoriasResultado.forEach(nombreCategoriaResultado => {
                            if(nombreCategoriaResultado.dataset.referencia === 'usuarios'){
                                nombreCategoriaResultado.insertAdjacentHTML('afterend' , armarFila(opcionesUsuarios)); 
                            }
                        });
                    });
                    
                }
            }
            
            
            if(data.usernames){                
                if(data.usernames.length > 0){
                    data.usernames.forEach(username => {
                        
                        var opcionesUsername = new objetoOpciones();
                        
                        opcionesUsername.clase = `resultado-content`;
                        opcionesUsername.link = `/usuario/${username.username}`;
                        opcionesUsername.contenido = `${username.username}`;
                        
                        
                        nombreCategoriasResultado.forEach(nombreCategoriaResultado => {
                            if(nombreCategoriaResultado.dataset.referencia === 'usuarios'){
                                nombreCategoriaResultado.insertAdjacentHTML('afterend' , armarFila(opcionesUsername)); 
                            }
                        });
                    });
                    
                }
            }
        })
        .catch(function(error){
            console.log(error);
        })
    }
});



/**FUNCIONES PARA RESULTADOS EN PAGINA DE RESULTADOS */

console.log('it works');
// input de la pagina de resultados
let inputBusqueda  = document.querySelector('.input-busqueda');


function armarFilaResultados(opciones,tipo) {
    
    if(tipo == 'usuarios'){
        return `
        <div class="resultado-categorias d-flex flex-row align-items-center w-100">
        <div class="resultado-item mr-3">
        <img class="" src="../public/avatars/${opciones.avatar}" alt="avatar">
        </div>
        <div class="resultado-item">
        <a href=""><strong>${opciones.nombre}</strong><span class="pl-3">(${opciones.username})</span></a>
        </div>
        <div class="resultado-item ml-auto mr-3">
        <a href="${opciones.link}"><i class="fas fa-user-plus"></i></a>
        </div>
        </div>
        `;
        
    }else if(tipo == 'categorias'){
        return `
        <div class="resultado-categorias d-flex flex-row align-items-center w-100">
        
        <div class="resultado-item">
        <a href="${opciones.link}"><strong>${opciones.nombre}</strong></a>
        </div>
        <div class="resultado-item ml-auto mr-3">
        <a href="${opciones.link}"><i class="fas fa-eye"></i></a>
        </div>
        </div>
        `;
    }
}


inputBusqueda.addEventListener('keyup' , (e) => {
    tdResultados = document.querySelectorAll(".resultado-categorias");

    busqueda = inputBusqueda.value;
    nombreCategoriasResultado = document.querySelectorAll(".nav-item-busqueda");

    spanPre = document.querySelector('#prev-search');
    resultadosUsuarios = document.querySelector('#list-usuarios');
    resultadosCategorias = document.querySelector('#list-categorias');
    resultadosTodo = document.querySelector('#list-todo');


    
    spanPre.innerText = busqueda;
    
    
    nombreCategoriasResultado.forEach(categoria => {
        tdResultados.forEach(resultado => {
            resultado.remove();
        });
        if(categoria.classList.contains('active')){
            if(busqueda != ""){
                fetch( `/api/resultados/${busqueda}`)
                .then(function(response){
                    tdResultados.forEach(resultado => {
                        resultado.remove();
                    });
                    return response.json();
                })
                .then(function (data){
                    if(data == []){
                        console.log('No hay nada');
                    }else{
                        tdResultados.forEach(resultado => {
                            resultado.remove();
                        });
                        let seleccion = categoria.dataset.ref;
                        if(seleccion == 'usuarios' || seleccion == 'todo'){
                            if(data.usuarios){
                                data.usuarios.forEach(usuario => {
                                    let resultado = armarFilaResultados({
                                        avatar: usuario.avatar,
                                        nombre: usuario.nombre,
                                        username: usuario.username,
                                        link: `/usuario/agregar/${usuario.username}`
                                    }, 'usuarios');

                                    resultadosUsuarios.insertAdjacentHTML('afterBegin' , resultado);
                                    resultadosTodo.insertAdjacentHTML('afterBegin' , resultado);
                                    
                                });
                            }

                            if(data.usernames){
                                data.usernames.forEach(usuario => {
                                    let resultado = armarFilaResultados({
                                        avatar: usuario.avatar,
                                        nombre: usuario.nombre,
                                        username: usuario.username,
                                        link: `/usuario/agregar/${usuario.username}`
                                    }, 'usuarios');

                                    resultadosUsuarios.insertAdjacentHTML('afterBegin' , resultado);
                                    resultadosTodo.insertAdjacentHTML('afterBegin' , resultado);
                                });
                            }
                        }

                        if(seleccion == 'categorias' || seleccion == 'todo'){
                            if(data.categorias){
                                data.categorias.forEach(categoria => {
                                    let resultado = armarFilaResultados({
                                        nombre: categoria.nombre,
                                        link: `/feed/categoria-${categoria.id}`
                                    }, 'categorias');

                                    
                                    resultadosCategorias.insertAdjacentHTML('afterBegin' , resultado);
                                    resultadosTodo.insertAdjacentHTML('afterBegin' , resultado);
                                });
                            }
                        }

                        
                    }
                })
                .catch(function(error) {
                    console.log(error);
                })
                
            }
        }
    });
    
});
