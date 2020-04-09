
function showBookmarked(desafio){
    fetch(`/bookmarks/get/${desafio.id_desafio}`)
    .then(function(response){
        return response.json();
    })

    .then(function(bookmarks){
        bookmarks.stringify;
        if(bookmarks == true){
            console.log(`El desafío ${desafio.id_desafio}  ya está bookmarkeado`);
            desafio.boton.classList.add("color-verde");
            desafio.span.innerHTML="Quitar";
        }

        if(bookmarks == false){
            console.log(`El desafío ${desafio.id_desafio}  no está bookmarkeado`);
            desafio.boton.classList.remove("color-verde");
            desafio.span.innerHTML="Guardar";
        }
    })

    .catch(function(error){
           console.log(error);
    })

}


function armarDatos(form){
    let objetoDatos = {
        id_desafio: form.querySelector("#bookmark-desafio").value,
        boton: form.querySelector("i"),
        span: form.querySelector("span"),
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


getDesafios();





