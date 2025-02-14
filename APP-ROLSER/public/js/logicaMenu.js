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


// Obtener los botones
var botonActivoUsuarioCVIP = document.getElementById('boton-efecto-active-cVIP');
var botonActivoUsuarioComercial = document.getElementById('boton-efecto-active-comercial');
var botonActivoUsuarioAdministrativo = document.getElementById('boton-efecto-active-administrativo');

// Obtener las líneas rojas
var lineaRojaVip = document.getElementById('linea-roja-vip');
var lineaRojaComer = document.getElementById('linea-roja-comer');
var lineaRojaAdmin = document.getElementById('linea-roja-admin');

// Asignar evento a cada botón
botonActivoUsuarioCVIP.addEventListener('click', opcionActivaMenuUsuarios);
botonActivoUsuarioComercial.addEventListener('click', opcionActivaMenuUsuarios);
botonActivoUsuarioAdministrativo.addEventListener('click', opcionActivaMenuUsuarios);

function opcionActivaMenuUsuarios() {

    var botonId = this.id;

    // Mostrar solo la línea correspondiente
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



