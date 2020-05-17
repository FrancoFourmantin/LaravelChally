//Pseudocodigo
// 1) Cuando le de click al boton de "votar" deberemos intercambiar las clases
// 2) Para eso necesitamos seleccionar el boton, y ambos contenedores

function votarRespuesta(respuesta){
    
    if(!respuesta instanceof Element){
        throw new Error('no existe elemento respuesta')
    }
    
    const botonVotar = respuesta.querySelector('.boton-votar');
    const contenedorPrimerStep = respuesta.querySelector('.contenedor-votar-respuesta')
    const contenedorSegundoStep = respuesta.querySelector('.contenedor-menu-elegir');
    const flechaAtras = respuesta.querySelector('.flecha-atras-votar');
    const botonesVotame = respuesta.querySelectorAll('.votame');
    const footer = respuesta.querySelector('.footer-respuesta');
    const closeFooter = respuesta.querySelector('.close-footer');
    
    
    //Funciones
    function toggleContenedores(){
        contenedorPrimerStep.classList.toggle('d-none');
        contenedorSegundoStep.classList.toggle('d-none');
    }
    
    function handleBotonVotarClick(e){
        e.preventDefault();
        toggleContenedores();
    }
    
    function handleOpenConfirmFooter() {
        if(footer.matches('d-flex')){
            return;
        }
        footer.classList.remove('d-none');
        footer.classList.add('d-flex');
    }
    
    function handleCloseConfirmFooter(e){
        
        if(footer.matches('d-none')){
            return;
        }
        if(e.currentTarget === e.target){
            console.log('entre al if');
            footer.classList.remove('d-flex');
            footer.classList.add('d-none');
            limpiarContenedores();
        }
        
    }
    
    
    function limpiarContenedores(){
        //Vamos a agarrar todos los contenedores
        const contenedores = [...respuesta.querySelectorAll('.contenedor-respuesta')];
        
        //Vamos a limpiar todos los contenedores primero
        contenedores.forEach(contenedor => { contenedor.classList.remove('seleccionado')});
        contenedores.forEach(contenedor => { contenedor.classList.remove('no-seleccionado')});
    }
    
    function handleBotonVotameClick(e){
        
        e.preventDefault();
        
        limpiarContenedores();
        
        //Vamos a agarrar el contenedor selecionado
        const contenedorSeleccionado = e.currentTarget.closest('.contenedor-respuesta');
        if(contenedorSeleccionado.matches('.no-seleccionado')) contenedorSeleccionado.classList.remove('no-seleccionado');
        contenedorSeleccionado.classList.add('seleccionado');
        
        
        // Vamos a seleccionar todos los demas elementos que no son el seleccionado   
        const contenedoresNoSeleccionados = [...respuesta.querySelectorAll(".contenedor-respuesta:not(.seleccionado)")];
        contenedoresNoSeleccionados.forEach(contenedor => {contenedor.classList.add('no-seleccionado')})
        
        handleOpenConfirmFooter();
    }
    
    
    //Event listeners
    botonVotar.addEventListener('click' , handleBotonVotarClick);
    flechaAtras.addEventListener('click' , toggleContenedores);
    botonesVotame.forEach(boton => boton.addEventListener('click' , handleBotonVotameClick));
    closeFooter.addEventListener('click' , handleCloseConfirmFooter);
    
}

const respuesta = votarRespuesta(document.querySelector('.contenedor-main-votar-respuesta'));
