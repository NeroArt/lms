// Obtener referencia al checkbox y al campo de contraseña
var checkbox = document.getElementById('cambiarpassword');
var passwordField = document.getElementById('password-field');

// Escuchar cambios en el checkbox
checkbox.addEventListener('change', function() {
    // Si el checkbox está marcado, mostrar el campo de contraseña, de lo contrario, ocultarlo
    if (checkbox.checked) {
        passwordField.style.display = 'block';
    } else {
        passwordField.style.display = 'none';
    }
});