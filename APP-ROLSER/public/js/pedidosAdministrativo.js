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

    //CRUD Modales Pedidos
    // Logica modales deshabilitar

    var modalConfirmacionEliminarPedido = document.getElementById("modalConfirmacionEliminarPedido");
    var mostrarConfirmacionEliminarPedido = document.getElementById("mostrarConfirmacionEliminarPedido");
    var ocultarConfirmacionCancelarPedido = document.getElementById("ocultarConfirmacionCancelarPedido");
    var ocultarConfirmacionConfirmarPedido = document.getElementById("ocultarConfirmacionConfirmarPedido");

    mostrarConfirmacionEliminarPedido.addEventListener('click', manejarModalConfirmacionPedido);
    ocultarConfirmacionCancelarPedido.addEventListener('click', manejarModalConfirmacionPedido);
    ocultarConfirmacionConfirmarPedido.addEventListener('click', manejarModalConfirmacionPedido);

    function manejarModalConfirmacionPedido() {

        var accionConfirmacionPedido = this.id;

        if (accionConfirmacionPedido == 'mostrarConfirmacionEliminarPedido') {
            modalConfirmacionEliminarPedido.classList.remove("hidden");
        }

        if (accionConfirmacionPedido == 'ocultarConfirmacionCancelarPedido') {
            modalConfirmacionEliminarPedido.classList.add("hidden");
        }

        if (accionConfirmacionPedido == 'ocultarConfirmacionConfirmarPedido') {
            modalConfirmacionEliminarPedido.classList.add("hidden");
        }

    }


    // Logica modal Modificar

    // Modal principal
    var modalModificarPedido = document.getElementById("modalModificarPedido");
    var modalConfirmacionGuardarCambiosPedido = document.getElementById("modalConfirmacionGuardarCambiosPedido");
    var mostrarModalModificarPedido = document.getElementById("mostrarModalModificarPedido");
    var ocultarModificarCancelarPedido = document.getElementById("ocultarModificarCancelarPedido");
    var mostrarModalConfirmacionGuardarPedido = document.getElementById("mostrarModalConfirmacionGuardarPedido");

    // Modal Confirmación
    var confirmarModalConfirmacionGuardarPedido = document.getElementById("confirmarModalConfirmacionGuardarPedido");
    var cancelarModalConfirmacionGuardarPedido = document.getElementById("cancelarModalConfirmacionGuardarPedido");

    // EventListeners Modificar
    mostrarModalModificarPedido.addEventListener('click', manejarModalModificarPedido);
    ocultarModificarCancelarPedido.addEventListener('click', manejarModalModificarPedido);
    mostrarModalConfirmacionGuardarPedido.addEventListener('click', manejarModalModificarPedido);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionGuardarPedido.addEventListener('click', manejarModalModificarPedido);
    cancelarModalConfirmacionGuardarPedido.addEventListener('click', manejarModalModificarPedido);

    function manejarModalModificarPedido() {

        var accionModificarPedido = this.id;

        //Modal modificar
        // Trigger del modal de modificar
        if (accionModificarPedido == 'mostrarModalModificarPedido') {
            modalModificarPedido.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de modificar con la X
        if (accionModificarPedido == 'ocultarModificarCancelarPedido') {
            modalModificarPedido.classList.add("hidden");
        }

        //Modal Confirmacion
        // Al darle a Guardar aparece este modal de Confirmación
        if (accionModificarPedido == 'mostrarModalConfirmacionGuardarPedido') {
            modalConfirmacionGuardarCambiosPedido.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionModificarPedido == 'confirmarModalConfirmacionGuardarPedido') {
            modalConfirmacionGuardarCambiosPedido.classList.add("hidden");
            modalModificarPedido.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de modificar
        if (accionModificarPedido == 'cancelarModalConfirmacionGuardarPedido') {
            modalConfirmacionGuardarCambiosPedido.classList.add("hidden");
        }

    }

}
