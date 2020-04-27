let inputSearch = document.querySelector('.input-search');
let tableSearch = document.querySelector('.table-search');
let formSearch = document.querySelector('.search-contenedor');
let inputBusqueda  = document.querySelector('.input-busqueda');


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


/*FUNCIONES PARA RESULTADOS*/
inputSearch.addEventListener('keypress' , (e) => {
    let busqueda = inputSearch.value;
    let nombreCategoriasResultado = document.querySelectorAll(".resultado-title");
    let tdResultados = document.querySelectorAll(".resultado-content");
    let objetoOpciones = {
        clase: '',
        link: ``,
        contenido: ``
    }
    
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
            
            if(data.categorias){
                if(data.categorias.length > 0){
                    data.categorias.forEach(categoria => {
                        
                        objetoOpciones.clase = `resultado-content`;
                        objetoOpciones.link = `/feed/categoria-${categoria.id}`;
                        objetoOpciones.contenido = `${categoria.nombre}`;  
                        
                        
                        nombreCategoriasResultado.forEach(nombreCategoriaResultado => {
                            if(nombreCategoriaResultado.dataset.referencia === 'categorias'){
                                nombreCategoriaResultado.insertAdjacentHTML('afterend' , armarFila(objetoOpciones)); 
                            }
                        });
                    });
                    
                }
            }
            
            if(data.usuarios){
                
                if(data.usuarios.length > 0){
                    data.usuarios.forEach(usuario => {
                        
                        objetoOpciones.clase = `resultado-content`;
                        objetoOpciones.link = `/usuario/${usuario.username}`;
                        objetoOpciones.contenido = `${usuario.nombre} ${usuario.apellido}`;
                        
                        
                        nombreCategoriasResultado.forEach(nombreCategoriaResultado => {
                            if(nombreCategoriaResultado.dataset.referencia === 'usuarios'){
                                nombreCategoriaResultado.insertAdjacentHTML('afterend' , armarFila(objetoOpciones)); 
                            }
                        });
                    });
                    
                }
            }
            
            
            if(data.usernames){
                
                if(data.usernames.length > 0){
                    data.usernames.forEach(username => {
                        
                        objetoOpciones.clase = `resultado-content`;
                        objetoOpciones.link = `/usuario/${username.username}`;
                        objetoOpciones.contenido = `${username.username}`;
                        
                        
                        nombreCategoriasResultado.forEach(nombreCategoriaResultado => {
                            if(nombreCategoriaResultado.dataset.referencia === 'usuarios'){
                                nombreCategoriaResultado.insertAdjacentHTML('afterend' , armarFila(objetoOpciones)); 
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
})
