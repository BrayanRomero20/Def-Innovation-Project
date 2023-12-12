"use strict";

const iniciar = document.querySelector(".iniciar");
const reiniciar = document.querySelector(".reiniciar");
const contSelect = document.querySelector(".temp_pre");
const contActual = document.querySelector(".temp_actual");
const horas = document.querySelector(".hours_dinamic");
const min = document.querySelector(".min_dinamic");
const seg = document.querySelector(".seg_dinamic");
let horasRestantes, minutosRestantes, segundosRestantes;
let temporizador;

iniciar.addEventListener("click", () => {
  horasRestantes = parseInt(document.querySelector("#opciones_horas").value, 10);
  minutosRestantes = parseInt(document.querySelector("#opciones_min").value, 10);
  segundosRestantes = parseInt(document.querySelector("#opciones_seg").value, 10);

  iniciar.style.display = "none";
  contSelect.style.display = "none";
  contActual.style.display = "flex"
  reiniciar.style.display = "flex"
  horas.textContent = horasRestantes.toString().padStart(2, "0");
  min.textContent = minutosRestantes.toString().padStart(2, "0");
  seg.textContent = segundosRestantes.toString().padStart(2, "0");

  // Solicitar permiso para notificaciones
  if (Notification.permission !== "granted") {
    Notification.requestPermission().then(function (permission) {
      if (permission === "granted") {
        iniciarTemporizador();
      }
    });
  } else {
    iniciarTemporizador();
  }
});

function iniciarTemporizador() {
  temporizador = setInterval(() => {
    if (segundosRestantes > 0) {
      segundosRestantes--;
    } else if (minutosRestantes > 0) {
      minutosRestantes--;
      segundosRestantes = 59;
    } else if (horasRestantes > 0) {
      horasRestantes--;
      minutosRestantes = 59;
      segundosRestantes = 59;
    }

    horas.textContent = horasRestantes.toString().padStart(2, "0");
    min.textContent = minutosRestantes.toString().padStart(2, "0");
    seg.textContent = segundosRestantes.toString().padStart(2, "0");

    if (horasRestantes === 1 && minutosRestantes === 0 && segundosRestantes === 0) {
      if (Notification.permission === "granted") {
        const notificacion = new Notification("¡Te queda 1 hora!", {
          body: "Aún tienes tiempo de continuar con tus actividades",
        });
      }
    }

    if (horasRestantes === 0 && minutosRestantes === 30 && segundosRestantes === 0) {
      if (Notification.permission === "granted") {
        const notificacion = new Notification("¡Solo quedan 30 minutos!", {
          body: "Ve mentalizándote para culminar con tus actividades.",
        });
      }
    }

    if (horasRestantes === 0 && minutosRestantes === 10 && segundosRestantes === 0) {
      if (Notification.permission === "granted") {
        const notificacion = new Notification("¡Solo quedan 10 minutos!", {
          body: "Tu tiempo está a punto de agotarse.",
        });
      }
    }

    if (horasRestantes === 0 && minutosRestantes === 1 && segundosRestantes === 0) {
      if (Notification.permission === "granted") {
        const notificacion = new Notification("¡Solo queda 1 minuto!", {
          body: "Tu tiempo está a nada de agotarse.",
        });
      }
    }

    if (horasRestantes === 0 && minutosRestantes === 2 && segundosRestantes === 8) {
      const mensajeAudio = document.getElementById("mensajeAudio");
      mensajeAudio.currentTime = 0;
      mensajeAudio.play();
    }

    if (horasRestantes === 0 && minutosRestantes === 0 && segundosRestantes === 0) {
      if (Notification.permission === "granted") {
        const notificacion = new Notification("¡Se acabó tu tiempo!", {
          body: "Por favor deja de hacer la actividad que estabas realizando",
        });
      }
      const mensajeAudio = document.getElementById("mensajeAudio2");
      mensajeAudio.currentTime = 0;
      mensajeAudio.play();
      clearInterval(temporizador);
    }
  }, 1000);
}

reiniciar.addEventListener("click", (e) => {
  clearInterval(temporizador);
  iniciar.style.display = "block";
  reiniciar.style.display = "none";
  contSelect.style.display = "flex";
  contActual.style.display = "none";
  let hoursDefect = document.querySelector("#opciones_horas");
  let minDefect = document.querySelector("#opciones_min");
  let segDefect = document.querySelector("#opciones_seg");
  hoursDefect.value = "00";
  minDefect.value = "00";
  segDefect.value = "00";
});

function getCPUUsage() {
  if (window.performance && window.performance.now) {
      const start = performance.now();
      
      for (let i = 0; i < 1000000; i++) {
          Math.sqrt(i);
      }

      const end = performance.now();
      const elapsed = end - start;

      const cpuUsage = (elapsed / 1000) * 100;

      return cpuUsage.toFixed(2) + '%';
  } else {
      return 'No se puede obtener información de uso de CPU';
  }
}

function updateMetrics() {
  const cpuUsageElement = document.getElementById('cpu-usage');
  const executionTimeElement = document.getElementById('execution-time');
  const memoryUsageElement = document.getElementById('memory-usage');

  setInterval(() => {
      const cpuUsage = getCPUUsage();
      const executionTime = performance.now().toFixed(2) + ' ms';
      const memoryUsage = (performance.memory.usedJSHeapSize / (1024 * 1024)).toFixed(2) + ' MB';

      cpuUsageElement.textContent = 'Uso de CPU: ' + cpuUsage;
      executionTimeElement.textContent = 'Tiempo de ejecución: ' + executionTime;
      memoryUsageElement.textContent = 'Uso de Memoria: ' + memoryUsage;
  }, 1000);
}

window.onload = updateMetrics;