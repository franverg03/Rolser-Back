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

    var modalConfirmacion = document.getElementById("modalConfirmacionEliminar");
    var mostrarModalConfirmacion = document.getElementById("mostrarConfirmacionEliminar");
    var ocultarModalConfirmacionCancel = document.getElementById("ocultarConfirmacionCancelar");
    var ocultarModalConfirmacionConf = document.getElementById("ocultarConfirmacionConfirmar");

    mostrarModalConfirmacion.addEventListener('click', manejarModalConfirmacion);
    ocultarModalConfirmacionCancel.addEventListener('click', manejarModalConfirmacion);
    ocultarModalConfirmacionConf.addEventListener('click', manejarModalConfirmacion);

    function manejarModalConfirmacion() {

        var accionConfirmacion = this.id;

        if (accionConfirmacion == 'mostrarConfirmacionEliminar') {
            modalConfirmacion.classList.remove("hidden");
        }

        if (accionConfirmacion == 'ocultarConfirmacionCancelar') {
            modalConfirmacion.classList.add("hidden");
        }

        if (accionConfirmacion == 'ocultarConfirmacionConfirmar') {
            modalConfirmacion.classList.add("hidden");
        }

    }



    // Logica opciones de usuarios
    // Obtener los botones
    var botonActivoCliente = document.getElementById('boton-efecto-active-cliente');
    var botonActivoClienteVip = document.getElementById('boton-efecto-active-cliente-vip');

    var crudCliente = document.getElementById('crudCliente');
    var crudClienteVip = document.getElementById('crudClienteVip');

    var lineaRojaCliente = document.getElementById('linea-roja-cliente');
    var lineaRojaClienteVip = document.getElementById('linea-roja-cliente-vip');


    botonActivoCliente.addEventListener('click', opcionActivaMenuClientes);
    botonActivoClienteVip.addEventListener('click', opcionActivaMenuClientes);

    function opcionActivaMenuClientes() {

        var botonId = this.id;

        if (botonId == 'boton-efecto-active-cliente') {
            crudCliente.style.display = "block"
            crudClienteVip.style.display = "none"
            lineaRojaCliente.style.display = "block";
            lineaRojaClienteVip.style.display = "none";
        } else if (botonId == 'boton-efecto-active-cliente-vip') {
            crudCliente.style.display = "none"
            crudClienteVip.style.display = "block"
            lineaRojaCliente.style.display = "none";
            lineaRojaClienteVip.style.display = "block";
        }
    }

    //CRUD Modales Cliente VIP
    // Modal Eliminar

    var modalConfirmacionEliminarCVip = document.getElementById("modalConfirmacionEliminarCVip");
    var mostrarConfirmacionEliminarCVip = document.getElementById("mostrarConfirmacionEliminarCVip");
    var ocultarConfirmacionCancelarCVip = document.getElementById("ocultarConfirmacionCancelarCVip");
    var ocultarConfirmacionConfirmarCVip = document.getElementById("ocultarConfirmacionConfirmarCVip");

    mostrarConfirmacionEliminarCVip.addEventListener('click', manejarModalConfirmacionCvip);
    ocultarConfirmacionCancelarCVip.addEventListener('click', manejarModalConfirmacionCvip);
    ocultarConfirmacionConfirmarCVip.addEventListener('click', manejarModalConfirmacionCvip);

    function manejarModalConfirmacionCvip() {

        var accionConfirmacionCVip = this.id;

        if (accionConfirmacionCVip == 'mostrarConfirmacionEliminarCVip') {
            modalConfirmacionEliminarCVip.classList.remove("hidden");
        }

        if (accionConfirmacionCVip == 'ocultarConfirmacionCancelarCVip') {
            modalConfirmacionEliminarCVip.classList.add("hidden");
        }

        if (accionConfirmacionCVip == 'ocultarConfirmacionConfirmarCVip') {
            modalConfirmacionEliminarCVip.classList.add("hidden");
        }

    }


    // Logica modal Modificar

    // Modal principal
    var modalModificarCVip = document.getElementById("modalModificarCVip");
    var modalConfirmacionGuardarCambiosCVip = document.getElementById("modalConfirmacionGuardarCambiosCVip");
    var mostrarModalModificarCVip = document.getElementById("mostrarModalModificarCVip");
    var ocultarModificarCancelarCVip = document.getElementById("ocultarModificarCancelarCVip");
    var mostrarModalConfirmacionGuardarCVip = document.getElementById("mostrarModalConfirmacionGuardarCVip");

    // Modal Confirmación
    var confirmarModalConfirmacionGuardarCVip = document.getElementById("confirmarModalConfirmacionGuardarCVip");
    var cancelarModalConfirmacionGuardarCVip = document.getElementById("cancelarModalConfirmacionGuardarCVip");

    // EventListeners Modificar
    mostrarModalModificarCVip.addEventListener('click', manejarModalModificarCVip);
    ocultarModificarCancelarCVip.addEventListener('click', manejarModalModificarCVip);
    mostrarModalConfirmacionGuardarCVip.addEventListener('click', manejarModalModificarCVip);
    // mostrarModalConvertirVip.addEventListener('click', manejarModalModificar);

    //EventListeners de Promocionar a vip
    // ocultarModificarContrasenyaCancelar.addEventListener('click', manejarModalModificar);
    // ocultarGuardandoEstatusVip.addEventListener('click', manejarModalModificar);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionGuardarCVip.addEventListener('click', manejarModalModificarCVip);
    cancelarModalConfirmacionGuardarCVip.addEventListener('click', manejarModalModificarCVip);

    function manejarModalModificarCVip() {

        var accionModificarCVip = this.id;

        //Modal modificar
        // Trigger del modal de modificar
        if (accionModificarCVip == 'mostrarModalModificarCVip') {
            modalModificarCVip.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de modificar con la X
        if (accionModificarCVip == 'ocultarModificarCancelarCVip') {
            modalModificarCVip.classList.add("hidden");
        }

        //Modal Confirmacion
        // Al darle a Guardar aparece este modal de Confirmación
        if (accionModificarCVip == 'mostrarModalConfirmacionGuardarCVip') {
            modalConfirmacionGuardarCambiosCVip.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionModificarCVip == 'confirmarModalConfirmacionGuardarCVip') {
            modalConfirmacionGuardarCambiosCVip.classList.add("hidden");
            modalModificarCVip.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de modificar
        if (accionModificarCVip == 'cancelarModalConfirmacionGuardarCVip') {
            modalConfirmacionGuardarCambiosCVip.classList.add("hidden");
        }
    }

    // Logica modal Añadir

    // Modal principal
    var modalAnyadirCVip = document.getElementById("modalAnyadirCVip");
    var modalConfirmacionAnyadirCambiosCVip = document.getElementById("modalConfirmacionAnyadirCambiosCVip");

    var mostrarModalAnyadirCVip = document.getElementById("mostrarModalAnyadirCVip");
    var ocultarAnyadirCancelarCVip = document.getElementById("ocultarAnyadirCancelarCVip");
    var mostrarModalConfirmacionAnyadirCVip = document.getElementById("mostrarModalConfirmacionAnyadirCVip");

    // Modal Confirmación
    var confirmarModalConfirmacionAnyadirCVip = document.getElementById("confirmarModalConfirmacionAnyadirCVip");
    var cancelarModalConfirmacionAnyadirCVip = document.getElementById("cancelarModalConfirmacionAnyadirCVip");

    // EventListeners Modificar
    mostrarModalAnyadirCVip.addEventListener('click', manejarModalAnyadirCVip);
    ocultarAnyadirCancelarCVip.addEventListener('click', manejarModalAnyadirCVip);
    mostrarModalConfirmacionAnyadirCVip.addEventListener('click', manejarModalAnyadirCVip);


    //EventListeners de Confirmacion
    confirmarModalConfirmacionAnyadirCVip.addEventListener('click', manejarModalAnyadirCVip);
    cancelarModalConfirmacionAnyadirCVip.addEventListener('click', manejarModalAnyadirCVip);

    function manejarModalAnyadirCVip() {

        var accionAnyadirCVip = this.id;

        //Modal modificar
        // Trigger del modal de modificar
        if (accionAnyadirCVip == 'mostrarModalAnyadirCVip') {
            modalAnyadirCVip.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de modificar con la X
        if (accionAnyadirCVip == 'ocultarAnyadirCancelarCVip') {
            modalAnyadirCVip.classList.add("hidden");
        }

        //Modal Confirmacion
        // Al darle a Guardar aparece este modal de Confirmación
        if (accionAnyadirCVip == 'mostrarModalConfirmacionAnyadirCVip') {
            modalConfirmacionAnyadirCambiosCVip.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionAnyadirCVip == 'confirmarModalConfirmacionAnyadirCVip') {
            modalConfirmacionAnyadirCambiosCVip.classList.add("hidden");
            modalAnyadirCVip.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de modificar
        if (accionAnyadirCVip == 'cancelarModalConfirmacionAnyadirCVip') {
            modalConfirmacionAnyadirCambiosCVip.classList.add("hidden");
        }
    }

    //Crud Clientes
    // Logica modal Modificar

    // Modal principal
    var modalModificar = document.getElementById("modalModificar");
    var modalConfirmacionGuardarCambios = document.getElementById("modalConfirmacionGuardarCambios");
    var mostrarModalModificar = document.getElementById("mostrarModalModificar");
    var ocultarModificarCancelar = document.getElementById("ocultarModificarCancelar");
    var mostrarModalConfirmacionGuardar = document.getElementById("mostrarModalConfirmacionGuardar");
    var mostrarModalConvertirVip = document.getElementById("mostrarModalConvertirVip");

    // Modal Promocionar a vip
    var ocultarModificarContrasenyaCancelar = document.getElementById("ocultarModificarContrasenyaCancelar");
    var ocultarGuardandoEstatusVip = document.getElementById("ocultarGuardandoEstatusVip");

    // Modal Confirmación
    var confirmarModalConfirmacionGuardar = document.getElementById("confirmarModalConfirmacionGuardar");
    var cancelarModalConfirmacionGuardar = document.getElementById("cancelarModalConfirmacionGuardar");

    // EventListeners Modificar
    mostrarModalModificar.addEventListener('click', manejarModalModificar);
    ocultarModificarCancelar.addEventListener('click', manejarModalModificar);
    mostrarModalConfirmacionGuardar.addEventListener('click', manejarModalModificar);
    // mostrarModalConvertirVip.addEventListener('click', manejarModalModificar);

    //EventListeners de Promocionar a vip
    // ocultarModificarContrasenyaCancelar.addEventListener('click', manejarModalModificar);
    // ocultarGuardandoEstatusVip.addEventListener('click', manejarModalModificar);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionGuardar.addEventListener('click', manejarModalModificar);
    cancelarModalConfirmacionGuardar.addEventListener('click', manejarModalModificar);

    function manejarModalModificar() {

        var accionModificar = this.id;

        //Modal modificar
        // Trigger del modal de modificar
        if (accionModificar == 'mostrarModalModificar') {
            modalModificar.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de modificar con la X
        if (accionModificar == 'ocultarModificarCancelar') {
            modalModificar.classList.add("hidden");
        }

        //Modal Confirmacion
        // Al darle a Guardar aparece este modal de Confirmación
        if (accionModificar == 'mostrarModalConfirmacionGuardar') {
            modalConfirmacionGuardarCambios.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionModificar == 'confirmarModalConfirmacionGuardar') {
            modalConfirmacionGuardarCambios.classList.add("hidden");
            modalModificar.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de modificar
        if (accionModificar == 'cancelarModalConfirmacionGuardar') {
            modalConfirmacionGuardarCambios.classList.add("hidden");
        }

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

    }

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

    //CLiente
    //Logica modal Añadir

    // Modal principal
    var modalAnyadir = document.getElementById("modalAnyadir");
    var modalConfirmacionAnyadir = document.getElementById("modalConfirmacionAnyadir");
    var mostrarModalAnyadir = document.getElementById("mostrarModalAnyadir");
    var ocultarAnyadirCancelar = document.getElementById("ocultarAnyadirCancelar");
    var mostrarModalConfirmacionAnyadir = document.getElementById("mostrarModalConfirmacionAnyadir");

    // Modal Confirmación
    var confirmarModalConfirmacionAnyadir = document.getElementById("confirmarModalConfirmacionAnyadir");
    var cancelarModalConfirmacionAnyadir = document.getElementById("cancelarModalConfirmacionAnyadir");

    // EventListeners Anyadir
    mostrarModalAnyadir.addEventListener('click', manejarModalAnyadir);
    ocultarAnyadirCancelar.addEventListener('click', manejarModalAnyadir);
    mostrarModalConfirmacionAnyadir.addEventListener('click', manejarModalAnyadir);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionAnyadir.addEventListener('click', manejarModalAnyadir);
    cancelarModalConfirmacionAnyadir.addEventListener('click', manejarModalAnyadir);

    function manejarModalAnyadir() {

        var accionAnyadir = this.id;

        //Modal Anyadir
        // Trigger del modal de añadir
        if (accionAnyadir == 'mostrarModalAnyadir') {
            modalAnyadir.classList.remove("hidden");
        }

        // Trigger para ocultar el modal de añadir con la X
        if (accionAnyadir == 'ocultarAnyadirCancelar') {
            modalAnyadir.classList.add("hidden");
        }

        //Modal Confirmacion Anyadir
        // Al darle a Anyadir aparece este modal de Confirmación
        if (accionAnyadir == 'mostrarModalConfirmacionAnyadir') {
            modalConfirmacionAnyadir.classList.remove("hidden");
        }

        // Al darle a Confirmar los dos modales se ocultan
        if (accionAnyadir == 'confirmarModalConfirmacionAnyadir') {
            modalConfirmacionAnyadir.classList.add("hidden");
            modalAnyadir.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de Anyadir
        if (accionAnyadir == 'cancelarModalConfirmacionAnyadir') {
            modalConfirmacionAnyadir.classList.add("hidden");
        }

    }

    // Funcion para limpiar input

    var limpiarInputBuscar = document.getElementById('limpiarInputBuscar');
    var inputBuscarLimpio = document.getElementById('inputBuscarLimpio');

    limpiarInputBuscar.addEventListener('click', limpiarInput);

    function limpiarInput(){
        inputBuscarLimpio.value = " ";
    }


}


