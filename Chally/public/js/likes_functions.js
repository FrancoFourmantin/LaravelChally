function likes(){

    // Selecciono todos los botones de los desafíos
    let likeForm = document.querySelectorAll("#form_like");

    // Selecciono todos los botones (like y dislike) de cada form
    let submitButtons = document.querySelectorAll("button[name=like]");

    // Accion almacena si le da like o dislike
    let accion = "";
    
    //A cada boton de like le ponemos un eventListener para saber que boton esta clickeando
    submitButtons.forEach(button => button.addEventListener("click" , function(e){
        accion = this.value;                                            
    }))

    
    // Crea un objeto por cada form
    function armarDatos(form){
        let objetoDatos = {
            id_usuario: "",
            id_desafio: "",
            id_respuesta: "",
            spanPorcentaje: "",
            spanLike: "",
            spanDislike: ""
        }  

        objetoDatos.id_usuario = form.querySelector("input[name=usuario]").value;

        // TENGO EL ID DE DESAFIO
        if(form.querySelector("input[name=desafio]")){
            objetoDatos.id_desafio = form.querySelector("input[name=desafio]").value;
        }else{
            objetoDatos.id_desafio = null;
        }

        // TENGO EL ID RESPUESTA (NO ME SIRVE POR AHORA)
        if(form.querySelector("input[name=respuesta]")){
            objetoDatos.id_respuesta = form.querySelector("input[name=respuesta]").value;
        }else{
            objetoDatos.id_respuesta = null;
        }

        objetoDatos.spanPorcentaje = form.querySelector(".porcentaje");
        objetoDatos.spanLike = form.querySelector(".likes");   
        objetoDatos.spanDislike = form.querySelector(".dislikes");
        
        return objetoDatos;
    }   // CIERRE FUNCIÓN ARMARDATOS    
    
    
    // Traigo los likes de cada objeto que cree en la función armarDatos
    function traerLikes(datos){
        // console.log(datos);
        fetch(`/likes/get/${datos.id_desafio}`)
        .then(function(response){
            return response.json();
        })
        .then(function(likes){
            likes.stringify;                                                                                  
            //Si el usuario ya le había dado like a ese desafio mostramos el corazon rojo
            if(likes.authUserLike == true){
                datos.spanLike.style.color = "#dd0000";                                            
            }

            //Si el usuario ya le había dado dislike a ese desafio mostramos el pulgar abajo rojo
            if(likes.authUserDislike == true){
                datos.spanDislike.style.color = "#dd0000";
            }

            datos.spanPorcentaje.innerHTML = likes.porcentajeDeLikes + '%';
        })
        .catch(function(error){
            console.log(error);
        })
    } // CIERRE FUNCIÓN TRAER LIKES Y STATUS
    
    
    
    function darLike(){
        
        //Primero invocamos todos los formularios de likes con su informacion
        window.addEventListener('load' , function(e){
            likeForm.forEach(function(form){
                objetoDatos = armarDatos(form);
                traerLikes(objetoDatos);
            })
        })
        
        //A cada uno de los likeForm le metemos un eventListener
        likeForm.forEach(form => form.addEventListener("submit" , function(e){
            e.preventDefault();
            //Seleccionamos el form que fue clickeado el particular
            let form = e.currentTarget;      
            objetoDatos = armarDatos(form);
            let token = form.querySelector('meta[name=csrf-token]').getAttribute('content');
            
            fetch('/likes/new',{
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'post',
                body: JSON.stringify({
                    id_usuario: objetoDatos.id_usuario,
                    id_desafio: objetoDatos.id_desafio,
                    accion: accion                                                
                })
            })
            .then(function(response){
                return response.text();
            })
            .then(function(data){ 
                //Vamos a remover las propiedades
                objetoDatos.spanLike.style.color = "#000000";
                objetoDatos.spanDislike.style.color = "#000000";
                //Aqui tiramos otro fetch para no recargar la pagina y mostrar los resultados
                traerLikes(objetoDatos);
                //Aqui finaliza el fetch embebido
            })
            .catch(function(error){
                console.log(error);
            });
            
        })) //Fin eventListener
        
    }
    // CIERRE FUNCIÓN DE DAR LIKE   


    darLike();
}

likes();
