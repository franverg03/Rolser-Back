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



  //Promocionar a VIP
   //DE MOMENTO COMENTADO HASTA QUE HAGAMOS EL BOTON DE PROMOCIONAR A VIP
    // var mostrarModalConvertirVip = document.getElementById("mostrarModalConvertirVip");

    // // Modal Promocionar a vip
    // var ocultarModificarContrasenyaCancelar = document.getElementById("ocultarModificarContrasenyaCancelar");
    // var ocultarGuardandoEstatusVip = document.getElementById("ocultarGuardandoEstatusVip");
        // ocultarModificarContrasenyaCancelar.addEventListener('click', manejarModalModificar);
    // ocultarGuardandoEstatusVip.addEventListener('click', manejarModalModificar);
    // mostrarModalConvertirVip.addEventListener('click', manejarModalModificar);


    // Modal modificar

    //cliente no vip
    var modalModificarCNoVip = document.getElementById("modalModificar");
    var modalConfirmacionGuardarCNoVip = document.getElementById("modalConfirmacionGuardarCambiosCNoVip");
    var mostrarModalModificarCNoVip = document.getElementById("mostrarModalModificar");
    var ocultarModificarCancelarCNoVip = document.getElementById("ocultarModificarCancelarCNoVip");
    var mostrarModalConfirmacionGuardarCNoVip = document.getElementById("mostrarModalConfirmacionGuardarCNoVip");
    var confirmarModalConfirmacionGuardarCNoVip = document.getElementById("confirmarModalConfirmacionGuardarCNoVip");
    var cancelarModalConfirmacionGuardarCNoVip = document.getElementById("cancelarModalConfirmacionGuardarCNoVip");


//cliente vip
    var modalModificarCVip = document.getElementById("modalModificarCVip");
    var modalConfirmacionGuardarCVip = document.getElementById("modalConfirmacionGuardarCambiosCVip");
    var mostrarModalModificarCVip = document.getElementById("mostrarModalModificarCVip");
    var ocultarModificarCancelarCVip = document.getElementById("ocultarModificarCancelarCVip");
    var mostrarModalConfirmacionGuardarCVip = document.getElementById("mostrarModalConfirmacionGuardarCVip");
    var confirmarModalGuardarCVip = document.getElementById("confirmarModalConfirmacionGuardarCVip");
    var cancelarModalGuardarCVip = document.getElementById("cancelarModalConfirmacionGuardarCVip");


    // EventListeners Modificar
    modalModificarCNoVip.addEventListener("click", function () {
        // Obtener todos los checkboxes marcados
        const checkboxes = document.querySelectorAll('input[name="clientes-no-vip"]:checked');

        // Validar que solo un cliente esté seleccionado
        if (checkboxes.length !== 1) {
            alert("Selecciona un único cliente para modificar.");
            return;
        }

        const clienteId = checkboxes[0].value; // Obtener el ID del cliente seleccionado

        // Hacer una petición AJAX a Laravel para obtener los datos del cliente
        fetch(`/clientes/${clienteId}/edit`, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Content-Type": "application/json",
            },
        })
        .then(response => response.json())
        .then(data => {
            // Rellenar los campos del modal con los datos del cliente
            document.getElementById("cliente_id").value = data.id_cliente_no_vip || "";
            document.getElementById("nombre").value = data.cliente_nombre_representante || "";
            document.getElementById("apellidos").value = data.cliente_apellidos_representante || "";
            document.getElementById("telefono").value = data.cliente_telefono_representante || "";
            document.getElementById("email").value = data.cliente_email_representante || "";
            document.getElementById("direccion").value = data.cliente_direccion_empresa || "";
            document.getElementById("codigo_postal").value = data.cliente_codigo_postal || "";
            document.getElementById("nif").value = data.cliente_nif|| "";
            document.getElementById("iban").value = data.cliente_cuenta_bancaria || "";





            // Mostrar el modal
            modalModificar.classList.remove("hidden");
        })
        .catch(error => console.error("Error al obtener datos del cliente:", error));
    });


    ocultarModificarCancelarCNoVip.addEventListener('click', () =>
        modalModificarCNoVip.classList.add("hidden")
    );



    mostrarModalConfirmacionGuardarCNoVip.addEventListener('click', () => modalConfirmacionGuardarCNoVip.classList.remove("hidden"));
    confirmarModalGuardarCNoVip.addEventListener('click', () => document.getElementById("formularioActualizarClienteNoVip").submit());
    cancelarModalGuardarCNoVip.addEventListener('click', () => modalConfirmacionGuardarCNoVip.classList.add("hidden"));
    confirmarModalConfirmacionGuardarCNoVip.addEventListener('click', manejarModalModificar);
    cancelarModalConfirmacionGuardarCNoVip.addEventListener('click', manejarModalModificar);





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
    mostrarModalAnyadir.addEventListener('click', manejarModalAnyadir);
    ocultarAnyadirCancelar.addEventListener('click', manejarModalAnyadir);
    mostrarModalConfirmacionAnyadir.addEventListener('click', manejarModalAnyadir);

    //EventListeners de Confirmacion
    confirmarModalConfirmacionAnyadirCNoVip.addEventListener('click', manejarModalAnyadir);
    cancelarModalConfirmacionAnyadirCNoVip.addEventListener('click', manejarModalAnyadir);

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
        if (accionAnyadir == 'confirmarModalConfirmacionAnyadirCNoVip') {
            modalConfirmacionAnyadir.classList.add("hidden");
            modalAnyadir.classList.add("hidden");
        }

        // Al darle a Cancelar volvemos al modal de Anyadir
        if (accionAnyadir == 'cancelarModalConfirmacionAnyadirCNoVip') {
            modalConfirmacionAnyadir.classList.add("hidden");
        }
    }

    //Logica de coger el id del cliente con el checkbox de la tabla
    var check= document.getElementById('check-cliente');
    var idCliente;

    if(check.checked){
        idCliente=check.value;
    }

}
