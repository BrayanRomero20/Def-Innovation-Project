const h2 = document.querySelector(".no_results")

var valorAlmacenado = localStorage.getItem("valorGuardado");

        if (valorAlmacenado) {
            h2.textContent = 'NO SE ENCONTRARON RESULTADOS DE: '  + "'" + valorAlmacenado + "'";
        }