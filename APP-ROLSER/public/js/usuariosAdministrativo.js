window.onload = function () {
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

            if(!tablaComerciales.classList.contains("hidden")) {
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
