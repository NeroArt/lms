// Obtener referencia al checkbox y al campo de email
var checkbox = document.getElementById('cambiaremail');
var emaildField = document.getElementById('email-field');

// Escuchar cambios en el checkbox
checkbox.addEventListener('change', function() {
    // Si el checkbox está marcado, mostrara el campo de email, de lo contrario, ocultarlo
    if (checkbox.checked) {
        emaildField.style.display = 'block';
    } else {
        emaildField.style.display = 'none';
    }
});