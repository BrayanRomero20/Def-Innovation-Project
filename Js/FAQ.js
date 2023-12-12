document.querySelectorAll('.desplegar').forEach(function (btn) {
    btn.addEventListener('click', function () {
        var respuesta = this.parentElement.nextElementSibling;

        if (respuesta.classList.contains('mostrando')) {
            respuesta.classList.remove('mostrando');
        } else {
            respuesta.classList.add('mostrando');
        }
    });
});