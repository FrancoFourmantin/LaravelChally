
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
                }
                else{
                    objetoParticular.span.innerHTML="Guardar";
                }
                // console.log("toggleado");
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




