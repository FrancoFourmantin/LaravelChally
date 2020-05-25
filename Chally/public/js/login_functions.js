
let button= document.querySelector("#submit_modal");
let token=document.querySelector("meta[name=csrf-token]").getAttribute('content');
button.addEventListener("click",processLogin);

function processLogin(e){
    e.preventDefault();
    if(button.nextElementSibling){
        button.nextElementSibling.remove();
    }
    let email= document.querySelector("#email_modal").value;
    let password= document.querySelector("#password_modal").value;

    fetch("/processlogin",
    {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: 'post',
        body: JSON.stringify({
            email:email,
            password:password
        })
    })

    .then(function(response){
        return response.text();
    })
    .then(function(data){ 
        if(data == "true"){
            window.location.href= "/feed";
        }
        else{
            button.insertAdjacentHTML('afterend','<div class="alert alert-danger text-center mt-3 font-weight-bold texto-chico">¡Usuario o contraseña incorrectos!</div>');
        }
    })
    .catch(function(error){
        console.log(error);
    });
}