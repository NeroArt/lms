// scripts.js
const abrirModal = document.getElementById('abrirModal');
const miModal = document.getElementById('miModal');
const miVideo = document.getElementById('miVideo');
const cerrarModal = document.getElementsByClassName('close')[0];

abrirModal.addEventListener('click', function() {
    miModal.style.display = 'block';
    miVideo.src = 'https://www.youtube.com/embed/ioQjLLfTIes?si=jwQeEmgIflgXXP2a'; // Cargar el video al abrir
});

cerrarModal.addEventListener('click', function() {
    miModal.style.display = 'none';
    miVideo.src = ''; // Detener el video al cerrar
    history.replaceState({}, document.title, window.location.pathname);
});

