// Verificar que la contraseña y la confirmación de contraseña sean iguales
document.getElementById('registro-form').addEventListener('submit', function(event) {
  var contrasena = document.getElementById('contrasena').value;
  var confirmarContrasena = document.getElementById('confirmar-contrasena').value;
  if (contrasena != confirmarContrasena) {
    alert('La contraseña y la confirmación de contraseña deben ser iguales.');
    event.preventDefault();	}
  });