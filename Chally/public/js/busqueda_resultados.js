// ###Funciones de UI####

let contenedorLinks = document.querySelectorAll('.link-util');



contenedorLinks.forEach(link => link.addEventListener('click' , (e) => {

    itemsLink = link.querySelectorAll('.link-util-item');

    itemsLink.forEach(item => item.onmouseover = function (e) {
       item.style.cursor = "pointer"; 
    });

    itemsLink.forEach(item => item.addEventListener('click',function (e) {
        window.location.href = link.dataset.href;
     }));
        
    

    if(link.classList.contains('link-escondido')){
        link.classList.remove('link-escondido');
        link.classList.add('link-visible');
    }else{
        link.classList.add('link-escondido');
        link.classList.remove('link-visible');
    }
}))


