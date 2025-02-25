window.onload = function () {

    // Lógica menú lateral desplegable
    var menu = document.getElementById('menu-pequenyo-administrativo');
    var content = document.getElementById('menu-grande-administrativo');

    let menuVisible = true; // Estado inicial del contenido (visible)

    function toggleContent() {
        menuVisible = !menuVisible; // Cambia el estado

        // Agrega o elimina la clase "hidden" para activar la transición
        content.classList.toggle('hidden', !menuVisible);
    }

    // Escucha el clic en el menú para alternar el contenido
    menu.addEventListener('click', toggleContent);

    // Logica modales

    var modalConfirmacion = document.getElementById("modalConfirmacion");
    var mostrarModalConfirmacion = document.getElementById("mostrarConfirmacion");
    var ocultarModalConfirmacionCancel = document.getElementById("ocultarConfirmacionCancelar");
    var ocultarModalConfirmacionConf = document.getElementById("ocultarConfirmacionConfirmar");

    mostrarModalConfirmacion.addEventListener('click', manejarModalConfirmacion);
    ocultarModalConfirmacionCancel.addEventListener('click', manejarModalConfirmacion);
    ocultarModalConfirmacionConf.addEventListener('click', manejarModalConfirmacion);

    function manejarModalConfirmacion() {

        var accionConfirmacion = this.id;

        if (accionConfirmacion == 'mostrarConfirmacion') {
            modalConfirmacion.classList.remove("hidden");
        }

        if (accionConfirmacion == 'ocultarConfirmacionCancelar') {
            modalConfirmacion.classList.add("hidden");
        }

        if (accionConfirmacion == 'ocultarConfirmacionConfirmar') {
            modalConfirmacion.classList.add("hidden");
        }
    }
}
