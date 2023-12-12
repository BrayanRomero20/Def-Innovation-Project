"use strict"

const inputBuscador = document.querySelector(".input");
const botonLupa = document.querySelector(".fa-magnifying-glass") 

inputBuscador.addEventListener("keypress", (e) => {
    if (e.key === "Enter"){
        if(inputBuscador.value==="calculadora" || inputBuscador.value==="Calculadora"|| inputBuscador.value==="CALCULADORA" || inputBuscador.value==="calculadora de huella ecologica" || 
        inputBuscador.value==="CALCULADORA DE HUELLA ECOLOGICA" || inputBuscador.value==="calculadora de huella ecologica" || inputBuscador.value==="CALCULADORA DE HUELLA ECOLÓGICA" || 
        inputBuscador.value==="calculator" || inputBuscador.value==="CALCULATOR" || inputBuscador.value==="ecological calculator" || inputBuscador.value==="ECOLOGICAL CALCULATOR"){
            e.preventDefault()
            window.location.href = "resultsCalculadora.html";
        }
        else if(inputBuscador.value==="niveles" || inputBuscador.value==="NIVELES" || inputBuscador.value==="Niveles" || inputBuscador.value==="levels" || inputBuscador.value==="LEVELS" ||
        inputBuscador.value==="niveles de huella ecologica" || inputBuscador.value==="NIVELES DE HUELLA ECOLOGICA" ||
        inputBuscador.value==="niveles de huella ecológica" || inputBuscador.value==="NIVELES DE HUELLA ECOLÓGICA" ||
        inputBuscador.value==="environmental impact levels" || inputBuscador.value==="ENVIROMENTAL IMPACT LEVELS"){
            e.preventDefault()
            window.location.href = "resultsNiveles.html";
        }
        else if(inputBuscador.value==="consejos" || inputBuscador.value==="CONSEJOS" || inputBuscador.value==="Consejos" || inputBuscador.value==="tips" || inputBuscador.value==="TIPS" || inputBuscador.value==="Tips"){
            e.preventDefault()
            window.location.href = "resultsConsejos.html";
        }
        else if(inputBuscador.value==="compensaciones" || inputBuscador.value==="Compensaciones" || inputBuscador.value==="COMPENSACIONES" || inputBuscador.value==="compensations" || inputBuscador.value==="Compensations" || inputBuscador.value==="COMPENSATIONS"){
            e.preventDefault()
            window.location.href = "resultsCompensaciones.html";
        }
        else if(inputBuscador.value==="contacto" || inputBuscador.value==="Contacto" || inputBuscador.value==="CONTACTO" || inputBuscador.value==="contactar" || inputBuscador.value==="Contactar" || inputBuscador.value==="CONTACTAR"
                || inputBuscador.value==="Contactos" || inputBuscador.value==="contactos" || inputBuscador.value==="CONTACTOS" || inputBuscador.value==="Redes" || inputBuscador.value==="redes" || inputBuscador.value==="REDES"
                || inputBuscador.value==="Redes sociales" || inputBuscador.value==="redes sociales" || inputBuscador.value==="REDES SOCIALES"){
            e.preventDefault()
            window.location.href = "resultsContacto.html";
        }
        else if(inputBuscador.value==="politica" || inputBuscador.value==="Politica" || inputBuscador.value==="POLITICAS" || inputBuscador.value==="POLÍTICAS" || inputBuscador.value==="POLITICA" || inputBuscador.value==="política" || inputBuscador.value==="Política" || inputBuscador.value==="POLÍTICA"
                || inputBuscador.value==="politicas" || inputBuscador.value==="Politicas" || inputBuscador.value==="POLITICAS" || inputBuscador.value==="políticas" || inputBuscador.value==="Políticas" || inputBuscador.value==="POLÍTICAS"
                || inputBuscador.value==="Politicas y privacidad" || inputBuscador.value==="politicas y privacidad" || inputBuscador.value==="Politicas y Privacidad" || inputBuscador.value==="Políticas y privacidad" || inputBuscador.value==="políticas y privacidad" || inputBuscador.value==="Políticas y Privacidad"){
            e.preventDefault()
            window.location.href = "resultsPoliticas.html";
        }
        else if(inputBuscador.value.includes("ustedes") || inputBuscador.value.includes("USTEDES") || inputBuscador.value.includes("son") || inputBuscador.value.includes("SON") || inputBuscador.value==="¿quiénes son?" || inputBuscador.value==="quiénes son?" || inputBuscador.value==="¿quienes son?" || inputBuscador.value==="quienes son?" || inputBuscador.value==="¿Quiénes son?" || inputBuscador.value==="Quiénes son?" || inputBuscador.value==="¿Quienes son?" || inputBuscador.value==="Quienes son?" 
            ){
            e.preventDefault()
            window.location.href = "resultsAcercade.html";
        }
        else if(inputBuscador.value.includes("¿") || inputBuscador.value.includes("?") && !inputBuscador.value.includes("quienes") && !inputBuscador.value.includes("son") && !inputBuscador.value.includes("ustedes")){
            e.preventDefault()
            window.location.href = "resultsFAQ.html";
        }
        else if(inputBuscador.value===""){
            e.preventDefault()
            window.location.href = "MENU.html";
        }
        else{
            e.preventDefault()
            window.location.href = "notResults.html";
            let guardarValor = () => {
                var valorInput = inputBuscador.value;
                localStorage.setItem("valorGuardado", valorInput);
                window.location.href = "notResults.html";
            }
            
            guardarValor()
        }
    }
})

botonLupa.addEventListener("click", (e) => {
    if(inputBuscador.value==="calculadora" || inputBuscador.value==="Calculadora"|| inputBuscador.value==="CALCULADORA" || inputBuscador.value==="calculadora de huella ecologica" || 
        inputBuscador.value==="CALCULADORA DE HUELLA ECOLOGICA" || inputBuscador.value==="calculadora de huella ecologica" || inputBuscador.value==="CALCULADORA DE HUELLA ECOLÓGICA" || 
        inputBuscador.value==="calculator" || inputBuscador.value==="CALCULATOR" || inputBuscador.value==="ecological calculator" || inputBuscador.value==="ECOLOGICAL CALCULATOR"){
            e.preventDefault()
            window.location.href = "resultsCalculadora.html";
        }
        else if(inputBuscador.value==="niveles" || inputBuscador.value==="NIVELES" || inputBuscador.value==="Niveles" || inputBuscador.value==="levels" || inputBuscador.value==="LEVELS" ||
        inputBuscador.value==="niveles de huella ecologica" || inputBuscador.value==="NIVELES DE HUELLA ECOLOGICA" ||
        inputBuscador.value==="niveles de huella ecológica" || inputBuscador.value==="NIVELES DE HUELLA ECOLÓGICA" ||
        inputBuscador.value==="environmental impact levels" || inputBuscador.value==="ENVIROMENTAL IMPACT LEVELS"){
            e.preventDefault()
            window.location.href = "resultsNiveles.html";
        }
        else if(inputBuscador.value==="consejos" || inputBuscador.value==="CONSEJOS" || inputBuscador.value==="Consejos" || inputBuscador.value==="tips" || inputBuscador.value==="TIPS" || inputBuscador.value==="Tips"){
            e.preventDefault()
            window.location.href = "resultsConsejos.html";
        }
        else if(inputBuscador.value==="compensaciones" || inputBuscador.value==="Compensaciones" || inputBuscador.value==="COMPENSACIONES" || inputBuscador.value==="compensations" || inputBuscador.value==="Compensations" || inputBuscador.value==="COMPENSATIONS"){
            e.preventDefault()
            window.location.href = "resultsCompensaciones.html";
        }
        else if(inputBuscador.value==="contacto" || inputBuscador.value==="Contacto" || inputBuscador.value==="CONTACTO" || inputBuscador.value==="contactar" || inputBuscador.value==="Contactar" || inputBuscador.value==="CONTACTAR"
                || inputBuscador.value==="Contactos" || inputBuscador.value==="contactos" || inputBuscador.value==="CONTACTOS" || inputBuscador.value==="Redes" || inputBuscador.value==="redes" || inputBuscador.value==="REDES"
                || inputBuscador.value==="Redes sociales" || inputBuscador.value==="redes sociales" || inputBuscador.value==="REDES SOCIALES"){
            e.preventDefault()
            window.location.href = "resultsContacto.html";
        }
        else if(inputBuscador.value==="politica" || inputBuscador.value==="Politica" || inputBuscador.value==="POLITICAS" || inputBuscador.value==="POLÍTICAS" || inputBuscador.value==="POLITICA" || inputBuscador.value==="política" || inputBuscador.value==="Política" || inputBuscador.value==="POLÍTICA"
                || inputBuscador.value==="politicas" || inputBuscador.value==="Politicas" || inputBuscador.value==="POLITICAS" || inputBuscador.value==="políticas" || inputBuscador.value==="Políticas" || inputBuscador.value==="POLÍTICAS"
                || inputBuscador.value==="Politicas y privacidad" || inputBuscador.value==="politicas y privacidad" || inputBuscador.value==="Politicas y Privacidad" || inputBuscador.value==="Políticas y privacidad" || inputBuscador.value==="políticas y privacidad" || inputBuscador.value==="Políticas y Privacidad"){
            e.preventDefault()
            window.location.href = "resultsPoliticas.html";
        }
        else if(inputBuscador.value.includes("ustedes") || inputBuscador.value.includes("USTEDES") || inputBuscador.value.includes("son") || inputBuscador.value.includes("SON") || inputBuscador.value==="¿quiénes son?" || inputBuscador.value==="quiénes son?" || inputBuscador.value==="¿quienes son?" || inputBuscador.value==="quienes son?" || inputBuscador.value==="¿Quiénes son?" || inputBuscador.value==="Quiénes son?" || inputBuscador.value==="¿Quienes son?" || inputBuscador.value==="Quienes son?" 
            ){
            e.preventDefault()
            window.location.href = "resultsAcercade.html";
        }
        else if(inputBuscador.value.includes("¿") || inputBuscador.value.includes("?") && !inputBuscador.value.includes("quienes") && !inputBuscador.value.includes("son") && !inputBuscador.value.includes("ustedes")){
            e.preventDefault()
            window.location.href = "resultsFAQ.html";
        }
        else if(inputBuscador.value===""){
            e.preventDefault()
            window.location.href = "MENU.html";
        }
        else{
            e.preventDefault()
            window.location.href = "notResults.html";
            let guardarValor = () => {
                var valorInput = inputBuscador.value;
                localStorage.setItem("valorGuardado", valorInput);
                window.location.href = "notResults.html";
            }
            
            guardarValor()
        }
})