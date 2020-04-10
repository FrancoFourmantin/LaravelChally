function showBookmarkList(){
    let bookmarkList = document.querySelector(".bookmarkList");
    let id_usuario= document.querySelector("input[name='usuario']").value;
    console.log(id_usuario);
    fetch(`/getuserbookmarks/${id_usuario}`)
    .then(function(response){
        return response.json();
    })

    .then(function(data){
        bookmarkList.innerHTML= "";

        data.forEach(function(desafio){
            bookmarkList.innerHTML += `<a class="animated fadeIn" href="/desafio/ver/${desafio.id_desafio}"><p>${desafio.get_desafio.nombre}</a> </br>
            <span>Finaliza el ${desafio.get_desafio.fecha_limite}</span></p>`;
            console.log(desafio.get_desafio.nombre);
        })
    })

    .catch(function(error){
          console.log(error);
    })    
}

function hideNotif() {
    let notificaciones = document.querySelectorAll(".notificacion");
    notificaciones.forEach(function(notificacion){
        notificacion.classList.add("fadeOut");
    })
  }

function showBookmarked(desafio){
    fetch(`/bookmarks/get/${desafio.id_desafio}`)
    .then(function(response){
        return response.json();
    })

    .then(function(bookmarks){
        bookmarks.stringify;
        if(bookmarks == true){
            desafio.icono.classList.add("color-verde");
            desafio.span.innerHTML="Quitar";
        }

        if(bookmarks == false){
            desafio.icono.classList.remove("color-verde");
            desafio.span.innerHTML="Guardar";
        }
    })

    .catch(function(error){
          console.log(error);
    })

}


function bookmarkAction(objetoParticular){

        objetoParticular.boton.addEventListener("click",function(e){
            e.preventDefault();
            fetch("/bookmarks/procesar",
            {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": objetoParticular.token
                },
                method: 'post',
                body: JSON.stringify({
                    bookmarkDesafio: objetoParticular.id_desafio,
                })
            })

            .then(function(response){
                return response.text();
            })
            .then(function(data){ 
                objetoParticular.icono.classList.toggle("color-verde");
                if(objetoParticular.span.innerHTML == "Guardar"){
                    objetoParticular.span.innerHTML="Quitar";
                    objetoParticular.boton.classList.toggle("tada");
                    let body = document.querySelector('body');
                    body.insertAdjacentHTML('beforeend', '<div class="notificacion animated fadeIn rounded alert-success position-fixed p-3" style="bottom:20px;right:20px;"><i class="fas fa-check"></i>  ¡Desafío Agregado a tus recordatorios!</div>');
                    window.setTimeout(hideNotif, 2500);
                }
                else{
                    objetoParticular.span.innerHTML="Guardar";
                    objetoParticular.boton.classList.toggle("tada");
                    let body = document.querySelector('body');
                    body.insertAdjacentHTML('beforeend', '<div class="notificacion animated fadeIn  rounded alert-danger position-fixed p-3" style="bottom:20px;right:20px;"><i class="fas fa-times"></i> ¡Quitaste el desafío de tus recordatorios!</div>');   
                    window.setTimeout(hideNotif, 2500);
                 
                }
                showBookmarkList();


            })
            .catch(function(error){
                console.log(error);
            });
            
            
            
        })

    
}


function armarDatos(form){
    let objetoDatos = {
        id_desafio: form.querySelector("#bookmark-desafio").value,
        icono: form.querySelector("i"),
        boton: form.querySelector("#bookmark-action"),
        span: form.querySelector("span"),
        token: form.querySelector('meta[name=csrf-tokenn]').getAttribute('content')
    }  
    console.log(objetoDatos);
    return objetoDatos;
}


function getDesafios(){

    let bookmarkForm = document.querySelectorAll("#bookmark-form");

    bookmarkForm.forEach(function(form){
        objetoDatos=armarDatos(form);
        showBookmarked(objetoDatos);
    })

}


function bookmarkActions(){
    let bookmarkForm = document.querySelectorAll("#bookmark-form");

    bookmarkForm.forEach(function(form){
        objetoDatos=armarDatos(form);
        console.log(objetoDatos);
        bookmarkAction(objetoDatos);
    })
}


getDesafios();
bookmarkActions();
showBookmarkList();



