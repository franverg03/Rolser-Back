// Obtener los botones
var botonActivoUsuarioCVIP = document.getElementById('boton-efecto-active-cVIP');
var botonActivoUsuarioComercial = document.getElementById('boton-efecto-active-comercial');
var botonActivoUsuarioAdministrativo = document.getElementById('boton-efecto-active-administrativo');

// Obtener las líneas rojas
var lineaRojaVip = document.getElementById('linea-roja-vip');
var lineaRojaComer = document.getElementById('linea-roja-comer');
var lineaRojaAdmin = document.getElementById('linea-roja-admin');

var tablaAdmin= document.getElementById('tabla-administrativos');
var tablaComercial= document.getElementById('tabla-comerciales');
var tablaCVip= document.getElementById('tabla-clientes-vip');
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
        if(tablaCVip.classList.contains("hidden")){
            tablaCVip.classList.remove("hidden");
        }

        if(!tablaAdmin.classList.contains("hidden")){
            tablaAdmin.classList.add("hidden");
        }

        if(!tablaComercial.classList.contains("hidden")){
            tablaComercial.classList.add("hidden");
        }

    } else if (botonId == 'boton-efecto-active-comercial') {
        lineaRojaVip.style.display = "none";
        lineaRojaComer.style.display = "block";
        lineaRojaAdmin.style.display = "none";

        if(!tablaCVip.classList.contains("hidden")){
            tablaCVip.classList.add("hidden");
        }

        if(!tablaAdmin.classList.contains("hidden")){
            tablaAdmin.classList.add("hidden");
        }

        if(tablaComercial.classList.contains("hidden")){
            tablaComercial.classList.remove("hidden");
        }

    } else if (botonId == 'boton-efecto-active-administrativo') {
        lineaRojaVip.style.display = "none";
        lineaRojaComer.style.display = "none";
        lineaRojaAdmin.style.display = "block";
        tablaAdmin.classList.remove("hidden");

        if(!tablaCVip.classList.contains("hidden")){
            tablaCVip.classList.add("hidden");
        }

        if(tablaAdmin.classList.contains("hidden")){
            tablaComercial.classList.remove("hidden");
        }

        if(!tablaComercial.classList.contains("hidden")){
            tablaComercial.classList.add("hidden");
        }
    }
}
