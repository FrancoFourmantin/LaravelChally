//Pseudocodigo
// 1) Cuando le de click al boton de "votar" deberemos intercambiar las clases
// 2) Para eso necesitamos seleccionar el boton, y ambos contenedores

function votarRespuesta(respuesta){
    
    if(!respuesta instanceof Element){
        throw new Error('no existe elemento respuesta')
    }
    
    const botonVotar = respuesta.querySelector('.primerTarjeta__link--active');
    const contenedorPrimerStep = respuesta.querySelector('.primerTarjeta')
    const contenedorSegundoStep = respuesta.querySelector('.vote-menu');
    const flechaAtras = respuesta.querySelector('.vote-menu__arrowback');
    const botonesVotame = respuesta.querySelectorAll('.respuesta__button--active');
    const footer = respuesta.querySelector('.confirm-footer');
    const closeFooter = respuesta.querySelector('.confirm-footer__close');
    const footerName = respuesta.querySelector('.confirm-footer__name');
    
    
    //Funciones
    function toggleContenedores(){
        contenedorPrimerStep.classList.toggle('d-none');
        contenedorSegundoStep.classList.toggle('d-none');
    }
    
    function handleBotonVotarClick(e){
        e.preventDefault();
        toggleContenedores();
    }

    
    function handleOpenConfirmFooter(e) {
        if(footer.matches('d-flex')){
            return;
        }
        footer.classList.remove('d-none');
        footer.classList.add('d-flex');

        footerName.innerText = e.target.previousSibling.value;
    
        const botonRespuesta = e.target;
        //Mientras el footer este abierto le ponemos un link al boton sacado del link que este seleccionado
        document.querySelector('.confirm-footer__button').addEventListener('click' , (e) => {
            botonRespuesta.closest('.respuesta__form').submit();
        })  
    }
    
    function handleCloseConfirmFooter(e){
        
        if(footer.matches('d-none')){
            return;
        }
        if(e.currentTarget === e.target){
            footer.classList.remove('d-flex');
            footer.classList.add('d-none');
            limpiarContenedores();
        }
        
    }
    
    
    function limpiarContenedores(){
        //Vamos a agarrar todos los contenedores
        const contenedores = [...respuesta.querySelectorAll('.respuesta')];
        
        //Vamos a limpiar todos los contenedores primero
        contenedores.forEach(contenedor => { contenedor.classList.remove('respuesta--seleccionado')});
        contenedores.forEach(contenedor => { contenedor.classList.remove('respuesta--noSeleccionado')});
    }
    
    function handleBotonVotameClick(e){
        
        e.preventDefault();
        
        limpiarContenedores();
        
        //Vamos a agarrar el contenedor selecionado
        const contenedorSeleccionado = e.currentTarget.closest('.respuesta');
        if(contenedorSeleccionado.matches('.respuesta--noSeleccionado')) contenedorSeleccionado.classList.remove('respuesta--noSeleccionado');
        contenedorSeleccionado.classList.add('respuesta--seleccionado');
        
        
        // Vamos a seleccionar todos los demas elementos que no son el seleccionado 
          
        const contenedoresNoSeleccionados = [...respuesta.querySelectorAll(".respuesta:not(.respuesta--seleccionado)")];
        contenedoresNoSeleccionados.forEach(contenedor => { contenedor.classList.add('respuesta--noSeleccionado')});
        
        handleOpenConfirmFooter(e);
    }
    
    
    //Event listeners
    botonVotar.addEventListener('click' , handleBotonVotarClick);
    flechaAtras.addEventListener('click' , toggleContenedores);
    botonesVotame.forEach(boton => boton.addEventListener('click' , handleBotonVotameClick));
    closeFooter.addEventListener('click' , handleCloseConfirmFooter);
    
}

const respuesta = votarRespuesta(document.querySelector('.main-votaciones'));
