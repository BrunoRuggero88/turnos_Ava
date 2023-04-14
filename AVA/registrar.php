<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles.css">
  <script src="app.js"></script>
  <?php 
		include("conexion.php"); 
	?>
  <title>Registro AVA CLUB</title>
  <script>
    window.onload = function() {
      document.getElementById('registro-form').addEventListener('submit', function(event) {
        var contrasena = document.getElementById('contrasena').value;
        var confirmarContrasena = document.getElementById('confirmar-contrasena').value;
        if (contrasena != confirmarContrasena) {
          alert('La contraseña y la confirmación de contraseña deben ser iguales.');
          event.preventDefault();	
        }  
      });
    };
  </script>
</head>

<body>
  <h1>Registro de nuevos clientes AVA CLUB</h1>
  <form action="conexion.php" method="POST" id="registro-form">
    <label for="numero_documento">número de documento:</label>
    <input type="text" id="numero_documento" name="numero_documento" required><br>

    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="correo" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" required><br>

    <label for="fecha-nacimiento">Fecha de nacimiento:</label>
    <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" required><br>
       

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br>

    <label for="confirmar-contrasena">Confirmar contraseña:</label><br/>
    <input type="password" id="confirmar-contrasena" name="confirmar-contrasena" required><br>      

    <button type="submit" name="register">Registrar</button>
  </form><br>
  


  
  <a href="index.php">Ingresar</a>
  
</body>

</html>