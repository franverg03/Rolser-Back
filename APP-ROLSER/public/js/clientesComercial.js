// Obtener los botones
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

    var botonActivoUsuarioCVIP = document.getElementById('boton-efecto-active-cVIP');
    var botonActivoUsuarioCNoVip = document.getElementById('boton-efecto-active-cNoVip');
    botonActivoUsuarioCVIP.addEventListener('click', opcionActivaMenuUsuarios);
    botonActivoUsuarioCNoVip.addEventListener('click', opcionActivaMenuUsuarios);
    // Obtener las líneas rojas
    var lineaRojaVip = document.getElementById('linea-roja-cVip');
    var lineaRojaCNoVip = document.getElementById('linea-roja-cNoVip');

    var tablaCVip = document.getElementById('tabla-clientes-vip');
    var tablaCNoVip = document.getElementById('tabla-clientes-noVip');

    function opcionActivaMenuUsuarios() {
        var botonId = this.id;
        // Mostrar solo la línea correspondiente
        if (botonId == 'boton-efecto-active-cVIP') {
            lineaRojaCNoVip.style.display = "none";
            lineaRojaVip.style.display = "block";
            if (tablaCVip.classList.contains("hidden")) {
                tablaCVip.classList.remove("hidden");
            }

            if(!tablaCNoVip.classList.contains("hidden")) {
                tablaCNoVip.classList.add("hidden");
            }
        } else {
            lineaRojaVip.style.display = "none";
            lineaRojaCNoVip.style.display = "block";
            tablaCNoVip.classList.remove("hidden");

            if (!tablaCVip.classList.contains("hidden")) {
                tablaCVip.classList.add("hidden");
            }
        }
    }

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
    var modalConfirmacionGuardarCambiosCNoVip = document.getElementById("modalConfirmacionGuardarCambiosCNoVip");
    var mostrarModalModificar = document.getElementById("mostrarModalModificar");
    var ocultarModificarCancelarCNoVip = document.getElementById("ocultarModificarCancelarCNoVip");
    var mostrarModalConfirmacionGuardarCNoVip = document.getElementById("mostrarModalConfirmacionGuardarCNoVip");
    var mostrarModalConvertirVip = document.getElementById("mostrarModalConvertirVip");

    // Modal Promocionar a vip
    var ocultarModificarContrasenyaCancelar = document.getElementById("ocultarModificarContrasenyaCancelar");
    var ocultarGuardandoEstatusVip = document.getElementById("ocultarGuardandoEstatusVip");

    // Modal Confirmación
    var confirmarModalConfirmacionGuardarCNoVip = document.getElementById("confirmarModalConfirmacionGuardarCNoVip");
    var cancelarModalConfirmacionGuardarCNoVip = document.getElementById("cancelarModalConfirmacionGuardarCNoVip");

    // EventListeners Modificar
    // mostrarModalModificar.addEventListener('click', manejarModalModificar);
    // ocultarModificarCancelarCNoVip.addEventListener('click', manejarModalModificar);
    // mostrarModalConfirmacionGuardarCNoVip.addEventListener('click', manejarModalModificar);
    // // mostrarModalConvertirVip.addEventListener('click', manejarModalModificar);

    // //EventListeners de Promocionar a vip
    // // ocultarModificarContrasenyaCancelar.addEventListener('click', manejarModalModificar);
    // // ocultarGuardandoEstatusVip.addEventListener('click', manejarModalModificar);

    // //EventListeners de Confirmacion
    // confirmarModalConfirmacionGuardarCNoVip.addEventListener('click', manejarModalModificar);
    // cancelarModalConfirmacionGuardarCNoVip.addEventListener('click', manejarModalModificar);

    // function manejarModalModificar() {

    //     var accionModificar = this.id;

    //     //Modal modificar
    //     // Trigger del modal de modificar
    //     if (accionModificar == 'mostrarModalModificar') {
    //         modalModificar.classList.remove("hidden");

    //     }

    //     // Trigger para ocultar el modal de modificar con la X
    //     if (accionModificar == 'ocultarModificarCancelarCNoVip') {
    //         modalModificar.classList.add("hidden");
    //     }

    //     //Modal Confirmacion
    //     // Al darle a Guardar aparece este modal de Confirmación
    //     if (accionModificar == 'mostrarModalConfirmacionGuardarCNoVip') {
    //         modalConfirmacionGuardarCambiosCNoVip.classList.remove("hidden");
    //     }

    //     // Al darle a Confirmar los dos modales se ocultan
    //     if (accionModificar == 'confirmarModalConfirmacionGuardarCNoVip') {
    //         modalConfirmacionGuardarCambiosCNoVip.classList.add("hidden");
    //         modalModificar.classList.add("hidden");
    //     }

    //     // Al darle a Cancelar volvemos al modal de modificar
    //     if (accionModificar == 'cancelarModalConfirmacionGuardarCNoVip') {
    //         modalConfirmacionGuardarCambiosCNoVip.classList.add("hidden");
    //     }
    // }

    // function pasarClienteNoVipAlModal() {
    //     Livewire.on('cargarClienteEnModal', cliente => {
    //         // Llenar los campos del modal con los datos recibidos
    //         document.getElementById('cliente_id').value = cliente.id;
    //         document.getElementById('empresa').value = cliente.empresa;
    //         document.getElementById('nombre').value = cliente.nombre;
    //         document.getElementById('apellidos').value = cliente.apellidos;
    //         document.getElementById('telefono').value = cliente.telefono;
    //         document.getElementById('email').value = cliente.email;
    //         document.getElementById('direccion').value = cliente.direccion;
    //         document.getElementById('nif').value = cliente.nif;
    //         document.getElementById('iban').value = cliente.iban;
    //         document.getElementById('comercial').value = cliente.comercial;
    //     });
    // }

    //Logica modal Añadir

    // Modal principal
    var modalAnyadir = document.getElementById("modalAnyadir");
    var modalConfirmacionAnyadir = document.getElementById("modalConfirmacionAnyadir");
    var mostrarModalAnyadir = document.getElementById("mostrarModalAnyadir");
    var ocultarAnyadirCancelar = document.getElementById("ocultarAnyadirCancelar");
    var mostrarModalConfirmacionAnyadir = document.getElementById("mostrarModalConfirmacionAnyadir");

    // Modal Confirmación
    var confirmarModalConfirmacionAnyadirCNoVip = document.getElementById("confirmarModalConfirmacionAnyadirCNoVip");
    var cancelarModalConfirmacionAnyadirCNoVip = document.getElementById("cancelarModalConfirmacionAnyadirCNoVip");

    // EventListeners Anyadir
    // mostrarModalAnyadir.addEventListener('click', manejarModalAnyadir);
    // ocultarAnyadirCancelar.addEventListener('click', manejarModalAnyadir);
    // mostrarModalConfirmacionAnyadir.addEventListener('click', manejarModalAnyadir);

    // //EventListeners de Confirmacion
    // confirmarModalConfirmacionAnyadirCNoVip.addEventListener('click', manejarModalAnyadir);
    // cancelarModalConfirmacionAnyadirCNoVip.addEventListener('click', manejarModalAnyadir);

    // function manejarModalAnyadir() {

    //     var accionAnyadir = this.id;

    //     //Modal Anyadir
    //     // Trigger del modal de añadir
    //     if (accionAnyadir == 'mostrarModalAnyadir') {
    //         modalAnyadir.classList.remove("hidden");
    //     }

    //     // Trigger para ocultar el modal de añadir con la X
    //     if (accionAnyadir == 'ocultarAnyadirCancelar') {
    //         modalAnyadir.classList.add("hidden");
    //     }

    //     //Modal Confirmacion Anyadir
    //     // Al darle a Anyadir aparece este modal de Confirmación
    //     if (accionAnyadir == 'mostrarModalConfirmacionAnyadir') {
    //         modalConfirmacionAnyadir.classList.remove("hidden");
    //     }

    //     // Al darle a Confirmar los dos modales se ocultan
    //     if (accionAnyadir == 'confirmarModalConfirmacionAnyadirCNoVip') {
    //         modalConfirmacionAnyadir.classList.add("hidden");
    //         modalAnyadir.classList.add("hidden");
    //     }

    //     // Al darle a Cancelar volvemos al modal de Anyadir
    //     if (accionAnyadir == 'cancelarModalConfirmacionAnyadirCNoVip') {
    //         modalConfirmacionAnyadir.classList.add("hidden");
    //     }
    // }
}
