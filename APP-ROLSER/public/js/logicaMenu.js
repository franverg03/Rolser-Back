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
    var botonActivoUsuarioCVIP = document.getElementById('boton-efecto-active-cVIP');
    var botonActivoUsuarioComercial = document.getElementById('boton-efecto-active-comercial');
    var botonActivoUsuarioAdministrativo = document.getElementById('boton-efecto-active-administrativo');


    var lineaRojaVip = document.getElementById('linea-roja-vip');
    var lineaRojaComer = document.getElementById('linea-roja-comer');
    var lineaRojaAdmin = document.getElementById('linea-roja-admin');


    botonActivoUsuarioCVIP.addEventListener('click', opcionActivaMenuUsuarios);
    botonActivoUsuarioComercial.addEventListener('click', opcionActivaMenuUsuarios);
    botonActivoUsuarioAdministrativo.addEventListener('click', opcionActivaMenuUsuarios);

    function opcionActivaMenuUsuarios() {

        var botonId = this.id;


        if (botonId == 'boton-efecto-active-cVIP') {
            lineaRojaVip.style.display = "block";
            lineaRojaComer.style.display = "none";
            lineaRojaAdmin.style.display = "none";
        } else if (botonId == 'boton-efecto-active-comercial') {
            lineaRojaVip.style.display = "none";
            lineaRojaComer.style.display = "block";
            lineaRojaAdmin.style.display = "none";
        } else if (botonId == 'boton-efecto-active-administrativo') {
            lineaRojaVip.style.display = "none";
            lineaRojaComer.style.display = "none";
            lineaRojaAdmin.style.display = "block";
        }
    }



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
