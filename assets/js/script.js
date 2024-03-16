

class validForm{


    selectElements()
    {
        const form = document.querySelector("#form");
        const inputProjeto = document.querySelector(".projeto");
        const inputData = document.querySelector(".data");
        const inputDataInicio = document.querySelector(".hora-inicio");
        const inputDataSaida = document.querySelector(".hora-saida");
        const btnSalvar = document.querySelector("#btn-salvar");
        const messageError = document.querySelector(".message-error");
        
        return {form, inputProjeto, inputData, inputDataInicio, inputDataSaida, btnSalvar, messageError}

    }

    evento()
    {   
        const el = this.selectElements();

        el.btnSalvar.addEventListener("click", (e)=>{
            e.preventDefault();
            el.inputProjeto.style.border = "1px solid #ccc"
            el.inputData.style.border = "1px solid #ccc"
            el.inputDataInicio.style.border = "1px solid #ccc"
            el.inputDataSaida.style.border = "1px solid #ccc"
            el.messageError.innerHTML = "";

            if (el.inputProjeto.value == "")
            {
                el.inputProjeto.style.border = '1px solid red'
                return el.messageError.innerHTML = "Por favor, preencher todos os campos";
            }

            if (el.inputData.value == "")
            {
                el.inputData.style.border = '1px solid red'
                return el.messageError.innerHTML = "Por favor, preencher todos os campos";
            }
            if (el.inputDataInicio.value == "")
            {
                el.inputDataInicio.style.border = '1px solid red'
                return el.messageError.innerHTML = "Por favor, preencher todos os campos";

            }
            if (el.inputDataSaida.value == "")
            {
                el.inputDataSaida.style.border = '1px solid red'
                return el.messageError.innerHTML = "Por favor, preencher todos os campos";

            }

            el.form.submit();


        });

    }

    

}

const validFor = new validForm();

validFor.evento();