<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agendamientos AVA CLUB</title>
	<link rel="stylesheet" href="styles.css">
  	<script src="app.js"></script>
	
</head>
<body>
	<header>
		<h1>Agendamientos AVA CLUB</h1>
	</header>
	<main>
		<form action="conexion.php" method="POST">
			<label for="cliente">Cliente:</label><br>
			<input type="text" id="cliente" name="cliente" placeholder="número de cédula"><br>
			<label for="contraseña">Contraseña:</label><br>
			<input type="password" id="contraseña" name="contraseña"><br>
			<input type="submit" value="Ingresar" name="ingresar"><br> <!-- agregamos el atributo name para poder identificar este botón en el archivo PHP -->
		</form>
		<a href="registrar.php">Registrarse</a>
	</main>
	<footer>
		<p>Para poder efectuar agendamientos debe estar registrado</p>
	</footer>
	
</body>
</html>