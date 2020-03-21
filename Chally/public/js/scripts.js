
function validarCreacionDesafio(){





    let form = document.querySelector("#nuevoDesafio");
    let campos = form.elements;
    let step2 = document.querySelector("#step-2");
    let submitButton= document.querySelector("button[type='submit']");
    let errorCount = 0;

    for(campito of campos){
        if(campito.classList.contains("is-invalid")){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }
    }

    campos[1].addEventListener('change',function(e){
        if(this.value == "" || this.value.length < 10){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")

        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")

        }
    })

    campos[2].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")

        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
        }
    })


    campos[3].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")

        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")
        }
    })

    
    campos[4].addEventListener('change',function(e){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(e.target.files[0]);
        output.classList.add("opacity-1");

    })




    document.addEventListener('change',function(e){
        if(campos[1].classList.contains("is-invalid") || campos[2].classList.contains("is-invalid") || campos[3].classList.contains("is-invalid")) {

        }
        else if (campos[1].classList.contains("is-valid") && campos[2].classList.contains("is-valid") && campos[3].classList.contains("is-valid") && output.src ){
            step2.classList.remove("opacity-0");
            step2.classList.add("opacity-1");
        }

        errorCount = 0;
        for(campito of campos){
            if(campito.classList.contains("is-invalid") || (campito.value=="0")){
                errorCount = errorCount+1;
            }
        }
        
        if(errorCount > 0){
            submitButton.disabled=true;
            submitButton.classList.add("btn-dark");
            submitButton.classList.remove("btn-secondary");

        }
        else{
            submitButton.disabled=false;
            submitButton.classList.remove("btn-dark");
            submitButton.classList.add("btn-secondary");
        }

    })

    campos[5].addEventListener('change',function(e){
        if(this.value == "" || this.value.length < 30){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");

        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        }
    })

    let camposDeRequisitos = document.querySelectorAll(".requisitos > input");
    let agregarRequisito = document.querySelector("#addMore");
    let req;
    let clickCount = 0;
    agregarRequisito.addEventListener("click",function(){


        req = document.querySelector(".requisitos > input.d-none")
        req.classList.remove("d-none");
        req.focus();
        clickCount = clickCount + 1;

        if(clickCount == 4){
            agregarRequisito.classList.remove("btn-success");
            agregarRequisito.classList.add("btn-dark");
            agregarRequisito.disabled=true;
        }

    })

    document.addEventListener('change',function(){
        campos[14].value="";
        camposDeRequisitos.forEach(function(requisito){
            if(requisito.value != ""){
                campos[14].value= campos[14].value + "<li>" + requisito.value + "</li>";
            }

            console.log(campos[14].value);
        })

    })

    campos[12].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")


        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")

        }
    })

    campos[13].addEventListener('change',function(e){
        if(this.value == "0"){
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            this.nextElementSibling.classList.remove("d-none")


        }
        else{
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
            this.nextElementSibling.classList.add("d-none")

        }
    })

}

