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
}


