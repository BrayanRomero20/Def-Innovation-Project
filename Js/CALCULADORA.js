"use strict";

// Array de preguntas y sus alternativas
const preguntas = [
  {
    pregunta: "1. ¿Cuántos kilómetros en automóvil recorres en promedio por semana?",
    alternativas: ["Entre 0km a 7km", "Entre 7km a 10km", "Entre 10km a 13km", "Entre 13km a 15km", "Más de 15km"]
  },
  {
    pregunta: "2. ¿Cuántas horas al día utilizas una computadora en el trabajo?",
    alternativas: ["Menos de 4 horas", "4 a 6 horas", "6 a 8 horas", "8 a 10 horas", "Más de 10h"]
  },
  {
    pregunta: "3. ¿Cuántos vuelos en avión tomas al año?",
    alternativas: ["No suelo tomar vuelos", "Entre 1 y 2 vuelos por año", "Entre 2 y 4 vuelos por año", "Entre 4 y 6 vuelos por año", "Más de 6 vuelos por año"]
  },
  {
    pregunta: "4. ¿Cuánta carne consumes a la semana en Kilogramos?",
    alternativas: ["Entre 1kg a 1.5kg", "Entre 1.5kg a 2.5kg", "Entre 2.5kg a 3.5kg", "Entre 3.5kg a 4.5kg", "Más de 4.5kg por semana"]
  },
  {
    pregunta: "5. ¿Con qué frecuencia reciclas los residuos sólidos en tu hogar?",
    alternativas: ["Reciclo siempre", "Reciclo muy seguido", "Reciclo aveces", "Reciclo pocas veces", "Nunca reciclo"]
  },
  {
    pregunta: "6. ¿Cuánta agua consumes en litros por día?",
    alternativas: ["Entre 1L a 1.5L", "Entre 1.5L a 1.75L", "Entre 1.75L a 2.25L", "Entre 2.25L a 2.75L", "Más de 2.75L"]
  },
  {
    pregunta: "7. ¿Alguna vez has pensado en instalar un sistema de energía solar en tu hogar?",
    alternativas: ["Ya tengo un sistema de energía solar", "Sí lo he pensado muchas veces", "Sí lo he pensado algunas veces", "Lo he pensado pocas veces", "Nunca lo he pensado"]
  },
  {
    pregunta: "8. ¿Cuántos documentos o informes imprimes en papel en un mes?",
    alternativas: ["Ninguno", "Menos de 5", " 5 a 10", "10 a 20", "Más de 20"]
  },
  {
    pregunta: "9. ¿Cuántos productos electrónicos nuevos compras al año?",
    alternativas: ["Entre 0 a 1", "Entre 1 a 2", "Entre 2 a 3", "Entre 3 a 4", "Más de 4"]
  },
  {
    pregunta: "10. ¿Con qué frecuencia utilizas el transporte público en lugar de un automóvil privado?",
    alternativas: ["Siempre", "Muchas veces", "Aveces", "Pocas veces", "Nunca"]
  },
  {
    pregunta: "11. ¿Cuántas veces al año haces viajes interprovinciales en automóvil?",
    alternativas: ["Entre 0 a 1", "Entre 1 a 2", "Entre 2 a 3", "Entre 3 a 4", "Más de 4"]
  },
  {
    pregunta: "12. ¿Con que frecuencia usas una bolsa biodegradable para hacer compras?",
    alternativas: ["Siempre", "Muchas veces", "Aveces", "Pocas veces", "Nunca"]
  },
  {
    pregunta: "13. ¿Consumes alimentos y bebidas en envases desechables durante tu jornada laboral?",
    alternativas: ["Nunca", "Rara vez", " A veces", "Frecuentemente", "Siempre"]
  },
  {
    pregunta: "14. ¿Cuántos dispositivos electrónicos con los que dispones están en standby?",
    alternativas: ["Entre 0 a 2", "Entre 2 a 4", "Entre 4 a 6", "Entre 6 a 8", "Más de 8"]
  },
  {
    pregunta: "15. ¿La mayoría de bombillas en tu hogar son LED de bajo consumo(LED) o ahorrativos(CFL)?",
    alternativas: ["Sí, todas lo son", "Sí, muchas lo son", "Solo algunas lo son", "Pocas lo son", "Ninguna de ellas lo son"]
  },
  {
    pregunta: "16. ¿Promueves la sostenibilidad y la conciencia ambiental entre tus colegas en el trabajo?",
    alternativas: ["Sí, a menudo doy consejos", " Sí, ocasionalmente", "Lo hago pero rara vez", "No estoy seguro/a", "No, no lo hago"]
  },
  {
    pregunta: "17. ¿Con qué frecuencia apagas tu computadora y monitor cuando no los estás utilizando?",
    alternativas: ["Siempre", "Casi siempre", "A veces", "Rara vez", "Nunca"]
  },
  {
    pregunta: "18. ¿Has considerado alguna vez tener un jardín o espacio para plantar árboles en tu propiedad?",
    alternativas: ["Ya tengo un jardín", "Sí lo he pensado muchas veces", "Sí lo he pensado algunas veces", "Lo he pensado pocas veces", "Nunca lo he pensado"]
  },
  {
    pregunta: "19. ¿Con que frecuencia participas en actividades de voluntariado ambiental?",
    alternativas: ["Siempre", "Muchas veces", "Aveces", "Pocas veces", "Nunca"]
  },
  {
    pregunta: "20. ¿Qué tipo de fuente de energía utiliza tu empresa en sus oficinas?",
    alternativas: ["100% renovable", " Mayormente renovable", " Mixto (renovable y no renovable)", "Mayormente no renovable", "100% no renovable"]
  }
];

const contEmpezar = document.querySelector(".cont_empezar")
const contenedor = document.querySelector(".contenido")
const empezarbutton = document.querySelector(".empezar")
const contenedorResult = document.querySelector(".cont_result")
const imagenResult = document.querySelector(".img_result")
const titleResult = document.querySelector(".resultado_Title")
const resultadoDescription = document.querySelector(".resultado_Description")

contenedor.style.display = "none";

empezarbutton.addEventListener("click", (e) => {
  contEmpezar.style.display = "none";
  contenedor.style.display = "flex";

  setTimeout(() => {
    contenedor.classList.remove("fade-in");
  }, 1000); 
});

const selectedAlternatives = new Array(preguntas.length).fill(null);
let preguntaActual = 0;
let puntajeLevel = 0;

const valoresDePuntos = [5, 4, 3, 2, 1];

const alternatives = document.querySelectorAll(".alternative");

let totalAlternativas = preguntas.length * valoresDePuntos.length; // Total de alternativas disponibles
let alternativasSeleccionadas = 0;

alternatives.forEach((alternative, index) => {
  alternative.addEventListener("click", (e) => {
    const puntosDeAlternativa = valoresDePuntos[index];
    const seleccionAnterior = selectedAlternatives[preguntaActual];

    if (seleccionAnterior !== null) {
      puntajeLevel -= valoresDePuntos[seleccionAnterior];
      selectedAlternatives[preguntaActual] = null; // Anula la selección anterior
      alternativasSeleccionadas--;
      updateAlternatives();
    }

    puntajeLevel += puntosDeAlternativa;
    selectedAlternatives[preguntaActual] = index;
    updateAlternatives();

    if (seleccionAnterior === null) {
      alternativasSeleccionadas++;
      actualizarProgreso(5);
    }
  });
});

function updateAlternatives() {
  const selectedAlternative = selectedAlternatives[preguntaActual];
  const alternatives = document.querySelectorAll(".alternative");
  for (let i = 0; i < alternatives.length; i++) {
    if (i === selectedAlternative) {
      alternatives[i].classList.add("alternativeSelected");
    } else {
      alternatives[i].classList.remove("alternativeSelected");
    }
  }
} 

const botonAnt = document.querySelector(".ant");
const botonSig = document.querySelector(".sig");

function avanzarPregunta() {
  if (preguntaActual < preguntas.length - 1) {
    preguntaActual++;
    mostrarPregunta();
  }
}

function retrocederPregunta() {
  if (preguntaActual > 0) {
    preguntaActual--;
    mostrarPregunta();
  }
}

botonAnt.addEventListener("click", (e) => {
  retrocederPregunta();
});

botonSig.addEventListener("click", (e) => {
  avanzarPregunta();
});

const toolbarItem = document.querySelector(".toolbarItem");

function actualizarProgreso(incremento){
  const progresoActual = parseInt(toolbarItem.getAttribute("data-progress"));
  const nuevoProgreso = Math.min(100, progresoActual + incremento);
  toolbarItem.setAttribute("data-progress", nuevoProgreso);
  toolbarItem.textContent = `${nuevoProgreso}%`;
  toolbarItem.style.width = `${nuevoProgreso}%`;
}  

const botonResultados = document.createElement("button")
    botonResultados.className = "ver_resultados"
    botonResultados.textContent = "Ver resultados"
    contenedor.appendChild(botonResultados)
    botonResultados.addEventListener("click", (e) => {
      let preguntasSinResponder = [];
      for (let i = 0; i < selectedAlternatives.length; i++) {
        if (selectedAlternatives[i] === null) {
          preguntasSinResponder.push(i + 1); // Guarda el número de la pregunta sin responder
        }
      }
      if (preguntasSinResponder.length > 1) {
        const mensaje = `Por favor, complete las preguntas ${preguntasSinResponder.join(", ")}`;
        alert(mensaje);
      }
      else if(preguntasSinResponder.length === 1){
        const mensaje = `Por favor, complete la pregunta ${preguntasSinResponder.join(", ")}`;
        alert(mensaje);
      }
       else {
          contenedor.style.display = "none";
          
          if(puntajeLevel >= 20 && puntajeLevel <= 25){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "critico.png"
            titleResult.textContent = "IMPACTO AMBIENTAL CRITICO"
            resultadoDescription.textContent = "Según los resultados, tu impacto ambiental es el nivel más alto, indica un impacto ambiental crítico que excede ampliamente la capacidad de la Tierra para regenerar recursos y absorber emisiones. Las personas aquí podrían estar causando un daño ambiental extremo y sosteniendo patrones insostenibles de consumo."
          }
      
          else if(puntajeLevel >= 26 && puntajeLevel <= 31){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "muyAlto.png"
            titleResult.textContent = "IMPACTO AMBIENTAL MUY ALTO"
            resultadoDescription.textContent = "Según los resultados, tu nivel representa un impacto ambiental muy alto. Las personas en este nivel contribuyen significativamente al agotamiento de recursos naturales y al cambio climático debido a un consumo excesivo de estos y prácticas insostenibles."
          }
      
          else if(puntajeLevel >= 32 && puntajeLevel <= 37){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "alto.png"
            titleResult.textContent = "IMPACTO AMBIENTAL ALTO"
            resultadoDescription.textContent = "Según los resultados, tu nivel representa un impacto ambiental alto. En este nivel las personas tienen un estilo de vida bastante consumista y contribuir notablemente a la explotación de recursos y las emisiones de gases de efecto invernadero."
          }
      
          else if(puntajeLevel >= 37 && puntajeLevel <= 47){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "moderadoalto.png"
            titleResult.textContent = "IMPACTO AMBIENTAL MODERADO ALTO"
            resultadoDescription.textContent = "Según los resultados, tu nivel representa un impacto ambiental moderado alto. Las personas consumen una cantidad significativa de recursos y tener una huella de carbono considerable."
          }
      
          else if(puntajeLevel >= 48 && puntajeLevel <= 60){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "moderado.png"
            titleResult.textContent = "IMPACTO AMBIENTAL MODERADO"
            resultadoDescription.textContent = "Según los resultados, tu nivel representa un impacto ambiental moderado. Las personas aquí están viviendo un estilo de vida típico en una sociedad industrializada, con un consumo de recursos y emisiones de carbono moderados, puedes mejorar."
          }
      
          else if(puntajeLevel >= 61 && puntajeLevel <= 75){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "moderadobajo.png"
            titleResult.textContent = "IMPACTO AMBIENTAL MODERADO BAJO"
            resultadoDescription.textContent = "Según los resultados, tu nivel representa un impacto ambiental moderado bajo. Las personas aquí tienen un estilo de vida consciente del medio ambiente, pero que todavía requiere mejoras en ciertas áreas, es un buen avance."
          }
      
          else if(puntajeLevel >= 76 && puntajeLevel <= 85){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "bajo.png"
            titleResult.textContent = "IMPACTO AMBIENTAL BAJO"
            resultadoDescription.textContent = "Según los resultados, tu nivel representa un impacto ambiental bajo. Las personas en este nivel toman medidas para reducir su huella, están cerca de la cúspide de consciencia sobre el medio ambiente, felicitaciones."
          }
          
          else if(puntajeLevel >= 86 && puntajeLevel <= 100){
            contenedorResult.style.display = "flex";
            contenedor.classList.add("fade-in");
            imagenResult.src = "muyBajo.jpg"
            titleResult.textContent = "IMPACTO AMBIENTAL MUY BAJO"
            resultadoDescription.textContent = "Según los resultados, tu nivel representa un impacto ambiental muy bajo. En este nivel, una persona tiene un impacto ambiental mínimo. Esto incluye prácticas sostenibles, como el uso de energías renovables, la reducción de residuos y el consumo responsable, felicitaciones."
          };
      }
  });

function mostrarPregunta() {
  const question = document.querySelector(".question");
  question.textContent = preguntas[preguntaActual].pregunta;
  const alternatives = document.querySelectorAll(".alternative");
  for (let i = 0; i < alternatives.length; i++) {
    alternatives[i].textContent = preguntas[preguntaActual].alternativas[i];
  }
  updateAlternatives();
}

mostrarPregunta();