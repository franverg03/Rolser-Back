// Obtener los botones
window.onload = function () {
    // Lógica menú lateral desplegable
    var menu = document.getElementById('menu-pequenyo-administrativo');
    var content = document.getElementById('menu-grande-administrativo');

    if(menu && content) {
        let menuVisible = true; // Estado inicial del contenido (visible)

        function toggleContent() {
            menuVisible = !menuVisible; // Cambia el estado

            // Agrega o elimina la clase "collapsed" para activar la transición
            content.classList.toggle('collapsed', !menuVisible);
        }

        menu.addEventListener('click', toggleContent);
    }


    if (document.getElementById('boton-efecto-active-cVIP')) {
        var botonActivoClienteVip = document.getElementById('boton-efecto-active-cVIP');
        var botonActivoClienteNoVip = document.getElementById('boton-efecto-active-cNoVip');
        botonActivoClienteVip.addEventListener('click', opcionActivaMenuClientes);
        botonActivoClienteNoVip.addEventListener('click', opcionActivaMenuClientes);
        // Obtener las líneas rojas
        var lineaRojaVip = document.getElementById('linea-roja-cVip');
        var lineaRojaCNoVip = document.getElementById('linea-roja-cNoVip');

        var tablaCVip = document.getElementById('tabla-clientes-vip');
        var tablaCNoVip = document.getElementById('tabla-clientes-noVip');

        function opcionActivaMenuClientes() {
            var botonId = this.id;
            // Mostrar solo la línea correspondiente
            if (botonId == 'boton-efecto-active-cVIP') {
                lineaRojaCNoVip.style.display = "none";
                lineaRojaVip.style.display = "block";
                if (tablaCVip.classList.contains("hidden")) {
                    tablaCVip.classList.remove("hidden");
                }

                if (!tablaCNoVip.classList.contains("hidden")) {
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
    }


    if (document.getElementById('boton-efecto-active-administrativo')) {
        var botonActivoUsuarioAdministrativo = document.getElementById('boton-efecto-active-administrativo');
        var botonActivoUsuarioComercial = document.getElementById('boton-efecto-active-comercial');
        botonActivoUsuarioAdministrativo.addEventListener('click', opcionActivaMenuUsuarios);
        botonActivoUsuarioComercial.addEventListener('click', opcionActivaMenuUsuarios);
        var lineaRojaAdmin = document.getElementById('linea-roja-admin');
        var lineaRojaComer = document.getElementById('linea-roja-comer');

        var tablaComerciales = document.getElementById('tabla-comerciales');
        var tablaAdministrativos = document.getElementById('tabla-administrativos');

        function opcionActivaMenuUsuarios() {
            var botonId = this.id;
            // Mostrar solo la línea correspondiente
            if (botonId == 'boton-efecto-active-administrativo') {
                lineaRojaComer.style.display = "none";
                lineaRojaAdmin.style.display = "block";

                if (tablaAdministrativos.classList.contains("hidden")) {
                    tablaAdministrativos.classList.remove("hidden");
                }

                if (!tablaComerciales.classList.contains("hidden")) {
                    tablaComerciales.classList.add("hidden");
                }
            } else {
                lineaRojaAdmin.style.display = "none";
                lineaRojaComer.style.display = "block";
                tablaComerciales.classList.remove("hidden");

                if (!tablaAdministrativos.classList.contains("hidden")) {
                    tablaAdministrativos.classList.add("hidden");
                }
            }
        }
    }
}
