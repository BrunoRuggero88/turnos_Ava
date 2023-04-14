<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seleccionar Sucursal</title>
	<link rel="stylesheet" href="styles.css">
    <script>
        // al hacer click en algún botón, redirigimos a la página correspondiente a la sucursal
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', () => {
                // si el id del botón es 1, redirigimos a serviciosava_1.php
                if (button.id === '1') {
                    window.location.href = 'serviciosava_1.php';
                }
                // si el id del botón es 2, redirigimos a serviciosava_2.php
                else if (button.id === '2') {
                    window.location.href = 'serviciosava_2.php';
                }
            });
        });
</script>
    
</head>
<body>
	<header>
		<h1>Selecciona una sucursal</h1>
	</header>
	<main>
    <?php
        // incluimos el archivo que contiene la función de conexión a la base de datos
        include('conexion.php');

        // realizamos una consulta para obtener todas las sucursales de la tabla sucursales
        $query = "SELECT * FROM sucursales";

        // ejecutamos la consulta
        $resultado = mysqli_query($conn, $query);

        // si la consulta devuelve filas, las procesamos y generamos los botones
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                // cada botón tendrá el nombre de la sucursal y su id (para identificarlo después)
                echo '<button id="' . $row['id'] . '">' . $row['nombre'] . '</button>';
            }
        }

        // cerramos la conexión a la base de datos
        mysqli_close($conn);
    ?>
		
	</main>
	<footer>
		<p>© AVA Club 2023</p>
	</footer>
</body>
</html>