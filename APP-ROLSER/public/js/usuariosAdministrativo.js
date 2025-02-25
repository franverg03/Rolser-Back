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




    // Logica opciones de usuarios
    // Obtener los botones
    var botonActivoUsuarioComercial = document.getElementById('boton-efecto-active-comercial');
    var botonActivoUsuarioAdministrativo = document.getElementById('boton-efecto-active-administrativo');


    var crudComercial = document.getElementById('crudComerciales');
    var crudAdministrativos = document.getElementById('crudAdministrativos');

    var lineaRojaComer = document.getElementById('linea-roja-comer');
    var lineaRojaAdmin = document.getElementById('linea-roja-admin');

    botonActivoUsuarioComercial.addEventListener('click', opcionActivaMenuUsuarios);
    botonActivoUsuarioAdministrativo.addEventListener('click', opcionActivaMenuUsuarios);

    function opcionActivaMenuUsuarios() {

        var botonId = this.id;


        if (botonId == 'boton-efecto-active-comercial') {
            crudComercial.style.display = "block"
            crudAdministrativos.style.display = "none"
            lineaRojaComer.style.display = "block";
            lineaRojaAdmin.style.display = "none";
        } else if (botonId == 'boton-efecto-active-administrativo') {
            crudComercial.style.display = "none"
            crudAdministrativos.style.display = "block"
            lineaRojaComer.style.display = "none";
            lineaRojaAdmin.style.display = "block";
        }
    }



    // Logica modales


    //Modal Promocionar a VIP
    //  Al darle al checkbox y marcarlo aparece este modal para asignarle manualmente una contraseña
    // if (mostrarModalConvertirVip.checked) {
    //     modalModificarContrasenya.classList.remove("hidden");
    // }

    // Trigger para ocultar el modal de Promocionar a Vip con la X
    // if (accionModificar == 'ocultarModificarContrasenyaCancelar') {
    //     modalModificarContrasenya.classList.add("hidden");
    // }

    // Al darle a Guardar añades una contraseña a este cliente y activas el status de vip
    // if (accionModificar == 'ocultarGuardandoEstatusVip') {
    //     modalModificarContrasenya.classList.add("hidden");
    // }

    //Logica boton borrar input

    // const input = document.getElementById("searchInput");
    // const button = document.getElementById("clearButton");

    // function toggleClearButton() {
    //     if (input.value.length > 0) {
    //         button.classList.remove("hidden");
    //     } else {
    //         button.classList.add("hidden");
    //     }
    // }

    // function clearInput() {
    //     input.value = "";
    //     toggleClearButton();
    // }

    // input.addEventListener("input", toggleClearButton);
    // button.addEventListener("click", clearInput);


    //CRUD Modales Comerciales
    // Logica modales deshabilitar

    var modalConfirmacionEliminarComercial = document.getElementById("modalConfirmacionEliminarComercial");
    var mostrarConfirmacionEliminarComercial = document.getElementById("mostrarConfirmacionEliminarComercial");
    var ocultarConfirmacionCancelarComercial = document.getElementById("ocultarConfirmacionCancelarComercial");
    var ocultarConfirmacionConfirmarComercial = document.getElementById("ocultarConfirmacionConfirmarComercial");

    mostrarConfirmacionEliminarComercial.addEventListener('click', manejarModalConfirmacionComercial);
    ocultarConfirmacionCancelarComercial.addEventListener('click', manejarModalConfirmacionComercial);
    ocultarConfirmacionConfirmarComercial.addEventListener('click', manejarModalConfirmacionComercial);

    function manejarModalConfirmacionComercial() {

        var accionConfirmacionComercial = this.id;

        if (accionConfirmacionComercial == 'mostrarConfirmacionEliminarComercial') {
            modalConfirmacionEliminarComercial.classList.remove("hidden");
        }

        if (accionConfirmacionComercial == 'ocultarConfirmacionCancelarComercial') {
            modalConfirmacionEliminarComercial.classList.add("hidden");
        }

        if (accionConfirmacionComercial == 'ocultarConfirmacionConfirmarComercial') {
            modalConfirmacionEliminarComercial.classList.add("hidden");
        }

    }


    // Logica modal Modificar

    // Modal principal
    var modalModificarComercial = document.getElementById("modalModificarComercial");
    var modalConfirmacionGuardarCambiosComercial = document.getElementById("modalConfirmacionGuardarCambiosComercial");
    var mostrarModalModificarComercial = document.getElementById("mostrarModalModificarComercial");
    var ocultarModificarCancelarComercial = document.getElementById("ocultarModificarCancelarComercial");
    var mostrarModalConfirmacionGuardarComercial = document.getElementById("mostrarModalConfirmacionGuardarComercial");

    // Modal Confirmación
    var confirmarModalConfirmacionGuardarComercial = document.getElementById("confirmarModalConfirmacionGuardarComercial");
    var cancelarModalConfirmacionGuardarComercial = document.getElementById("cancelarModalConfirmacionGuardarComercial");

    // EventListeners Modificar
    mostrarModalModificarComercial.addEventListener('click', manejarModalModificarComercial);
    ocultarModificarCancelarComercial.addEventListener('click', manejarModalModificarComercial);
    mostrarModalConfirmacionGuardarComercial.addEventListener('click', manejarModalModificarComercial);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionGuardarComercial.addEventListener('click', manejarModalModificarComercial);
    cancelarModalConfirmacionGuardarComercial.addEventListener('click', manejarModalModificarComercial);

    function manejarModalModificarComercial() {

        var accionModificarComercial = this.id;

        //Modal modificar
        // Trigger del modal de modificar
        if (accionModificarComercial == 'mostrarModalModificarComercial') {
            modalModificarComercial.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de modificar con la X
        if (accionModificarComercial == 'ocultarModificarCancelarComercial') {
            modalModificarComercial.classList.add("hidden");
        }

        //Modal Confirmacion
        // Al darle a Guardar aparece este modal de Confirmación
        if (accionModificarComercial == 'mostrarModalConfirmacionGuardarComercial') {
            modalConfirmacionGuardarCambiosComercial.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionModificarComercial == 'confirmarModalConfirmacionGuardarComercial') {
            modalConfirmacionGuardarCambiosComercial.classList.add("hidden");
            modalModificarComercial.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de modificar
        if (accionModificarComercial == 'cancelarModalConfirmacionGuardarComercial') {
            modalConfirmacionGuardarCambiosComercial.classList.add("hidden");
        }

    }

    //Logica modal Añadir

    // Modal principal
    var modalAnyadirComercial = document.getElementById("modalAnyadirComercial");
    var modalConfirmacionAnyadirComercial = document.getElementById("modalConfirmacionAnyadirComercial");
    var mostrarModalAnyadirComercial = document.getElementById("mostrarModalAnyadirComercial");
    var ocultarAnyadirCancelarComercial = document.getElementById("ocultarAnyadirCancelarComercial");
    var mostrarModalConfirmacionAnyadirComercial = document.getElementById("mostrarModalConfirmacionAnyadirComercial");

    // Modal Confirmación
    var confirmarModalConfirmacionAnyadirComercial = document.getElementById("confirmarModalConfirmacionAnyadirComercial");
    var cancelarModalConfirmacionAnyadirComercial = document.getElementById("cancelarModalConfirmacionAnyadirComercial");

    // EventListeners Anyadir
    mostrarModalAnyadirComercial.addEventListener('click', manejarModalAnyadirComercial);
    ocultarAnyadirCancelarComercial.addEventListener('click', manejarModalAnyadirComercial);
    mostrarModalConfirmacionAnyadirComercial.addEventListener('click', manejarModalAnyadirComercial);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionAnyadirComercial.addEventListener('click', manejarModalAnyadirComercial);
    cancelarModalConfirmacionAnyadirComercial.addEventListener('click', manejarModalAnyadirComercial);

    function manejarModalAnyadirComercial() {

        var accionAnyadirComercial = this.id;

        //Modal Anyadir
        // Trigger del modal de añadir
        if (accionAnyadirComercial == 'mostrarModalAnyadirComercial') {
            modalAnyadirComercial.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de añadir con la X
        if (accionAnyadirComercial == 'ocultarAnyadirCancelarComercial') {
            modalAnyadirComercial.classList.add("hidden");
        }

        //Modal Confirmacion Anyadir
        // Al darle a Anyadir aparece este modal de Confirmación
        if (accionAnyadirComercial == 'mostrarModalConfirmacionAnyadirComercial') {
            modalConfirmacionAnyadirComercial.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionAnyadirComercial == 'confirmarModalConfirmacionAnyadirComercial') {
            modalConfirmacionAnyadirComercial.classList.add("hidden");
            modalAnyadirComercial.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de Anyadir
        if (accionAnyadirComercial == 'cancelarModalConfirmacionAnyadirComercial') {
            modalConfirmacionAnyadirComercial.classList.add("hidden");
        }

    }

    //CRUD Modales Administrativo
    // Logica modales deshabilitar

    var modalConfirmacionEliminarAdministrativo = document.getElementById("modalConfirmacionEliminarAdministrativo");
    var mostrarConfirmacionEliminarAdministrativo = document.getElementById("mostrarConfirmacionEliminarAdministrativo");
    var ocultarConfirmacionCancelarAdministrativo = document.getElementById("ocultarConfirmacionCancelarAdministrativo");
    var ocultarConfirmacionConfirmarAdministrativo = document.getElementById("ocultarConfirmacionConfirmarAdministrativo");

    mostrarConfirmacionEliminarAdministrativo.addEventListener('click', manejarModalConfirmacionAdministrativo);
    ocultarConfirmacionCancelarAdministrativo.addEventListener('click', manejarModalConfirmacionAdministrativo);
    ocultarConfirmacionConfirmarAdministrativo.addEventListener('click', manejarModalConfirmacionAdministrativo);

    function manejarModalConfirmacionAdministrativo() {

        var accionConfirmacionAdministrativo = this.id;

        if (accionConfirmacionAdministrativo == 'mostrarConfirmacionEliminarAdministrativo') {
            modalConfirmacionEliminarAdministrativo.classList.remove("hidden");
        }

        if (accionConfirmacionAdministrativo == 'ocultarConfirmacionCancelarAdministrativo') {
            modalConfirmacionEliminarAdministrativo.classList.add("hidden");
        }

        if (accionConfirmacionAdministrativo == 'ocultarConfirmacionConfirmarAdministrativo') {
            modalConfirmacionEliminarAdministrativo.classList.add("hidden");
        }

    }


    // Logica modal Modificar

    // Modal principal
    var modalModificarAdministrativo = document.getElementById("modalModificarAdministrativo");
    var modalConfirmacionGuardarCambiosAdministrativo = document.getElementById("modalConfirmacionGuardarCambiosAdministrativo");
    var mostrarModalModificarAdministrativo = document.getElementById("mostrarModalModificarAdministrativo");
    var ocultarModificarCancelarAdministrativo = document.getElementById("ocultarModificarCancelarAdministrativo");
    var mostrarModalConfirmacionGuardarAdministrativo = document.getElementById("mostrarModalConfirmacionGuardarAdministrativo");

    // Modal Confirmación
    var confirmarModalConfirmacionGuardarAdministrativo = document.getElementById("confirmarModalConfirmacionGuardarAdministrativo");
    var cancelarModalConfirmacionGuardarAdministrativo = document.getElementById("cancelarModalConfirmacionGuardarAdministrativo");

    // EventListeners Modificar
    mostrarModalModificarAdministrativo.addEventListener('click', manejarModalModificarAdministrativo);
    ocultarModificarCancelarAdministrativo.addEventListener('click', manejarModalModificarAdministrativo);
    mostrarModalConfirmacionGuardarAdministrativo.addEventListener('click', manejarModalModificarAdministrativo);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionGuardarAdministrativo.addEventListener('click', manejarModalModificarAdministrativo);
    cancelarModalConfirmacionGuardarAdministrativo.addEventListener('click', manejarModalModificarAdministrativo);

    function manejarModalModificarAdministrativo() {

        var accionModificarAdministrativo = this.id;

        //Modal modificar
        // Trigger del modal de modificar
        if (accionModificarAdministrativo == 'mostrarModalModificarAdministrativo') {
            modalModificarAdministrativo.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de modificar con la X
        if (accionModificarAdministrativo == 'ocultarModificarCancelarAdministrativo') {
            modalModificarAdministrativo.classList.add("hidden");
        }

        //Modal Confirmacion
        // Al darle a Guardar aparece este modal de Confirmación
        if (accionModificarAdministrativo == 'mostrarModalConfirmacionGuardarAdministrativo') {
            modalConfirmacionGuardarCambiosAdministrativo.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionModificarAdministrativo == 'confirmarModalConfirmacionGuardarAdministrativo') {
            modalConfirmacionGuardarCambiosAdministrativo.classList.add("hidden");
            modalModificarAdministrativo.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de modificar
        if (accionModificarAdministrativo == 'cancelarModalConfirmacionGuardarAdministrativo') {
            modalConfirmacionGuardarCambiosAdministrativo.classList.add("hidden");
        }

    }

    //Logica modal Añadir

    // Modal principal
    var modalAnyadirAdministrativo = document.getElementById("modalAnyadirAdministrativo");
    var estiloOpacidad = document.getElementById("estiloOpacidad");
    var modalConfirmacionAnyadirAdministrativo = document.getElementById("modalConfirmacionAnyadirAdministrativo");
    var mostrarModalAnyadirAdministrativo = document.getElementById("mostrarModalAnyadirAdministrativo");
    var ocultarAnyadirCancelarAdministrativo = document.getElementById("ocultarAnyadirCancelarAdministrativo");
    var mostrarModalConfirmacionAnyadirAdministrativo = document.getElementById("mostrarModalConfirmacionAnyadirAdministrativo");

    // Modal Confirmación
    var confirmarModalConfirmacionAnyadirAdministrativo = document.getElementById("confirmarModalConfirmacionAnyadirAdministrativo");
    var cancelarModalConfirmacionAnyadirAdministrativo = document.getElementById("cancelarModalConfirmacionAnyadirAdministrativo");

    // EventListeners Anyadir
    mostrarModalAnyadirAdministrativo.addEventListener('click', manejarModalAnyadirAdministrativo);
    ocultarAnyadirCancelarAdministrativo.addEventListener('click', manejarModalAnyadirAdministrativo);
    mostrarModalConfirmacionAnyadirAdministrativo.addEventListener('click', manejarModalAnyadirAdministrativo);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionAnyadirAdministrativo.addEventListener('click', manejarModalAnyadirAdministrativo);
    cancelarModalConfirmacionAnyadirAdministrativo.addEventListener('click', manejarModalAnyadirAdministrativo);

    function manejarModalAnyadirAdministrativo() {

        var accionAnyadirAdministrativo = this.id;

        //Modal Anyadir
        // Trigger del modal de añadir
        if (accionAnyadirAdministrativo == 'mostrarModalAnyadirAdministrativo') {
            modalAnyadirAdministrativo.classList.remove("hidden");
            estiloOpacidad.classList.add("blur-effect");
        }

        // Trigger para ocultar el modal de añadir con la X
        if (accionAnyadirAdministrativo == 'ocultarAnyadirCancelarAdministrativo') {
            modalAnyadirAdministrativo.classList.add("hidden");
        }

        //Modal Confirmacion Anyadir
        // Al darle a Anyadir aparece este modal de Confirmación
        if (accionAnyadirAdministrativo == 'mostrarModalConfirmacionAnyadirAdministrativo') {
            modalConfirmacionAnyadirAdministrativo.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionAnyadirAdministrativo == 'confirmarModalConfirmacionAnyadirAdministrativo') {
            modalConfirmacionAnyadirAdministrativo.classList.add("hidden");
            modalAnyadirAdministrativo.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de Anyadir
        if (accionAnyadirAdministrativo == 'cancelarModalConfirmacionAnyadirAdministrativo') {
            modalConfirmacionAnyadirAdministrativo.classList.add("hidden");
        }

    }


}
