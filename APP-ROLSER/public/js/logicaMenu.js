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






