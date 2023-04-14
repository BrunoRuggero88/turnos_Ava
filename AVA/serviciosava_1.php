<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Obtener la lista de servicios desde la base de datos
$query = "SELECT * FROM servicios";
$resultado = mysqli_query($conn, $query);

// Obtener la lista de profesionales por sucursal y servicio
$query2 = "SELECT s.nombre AS sucursal, se.nombre AS servicio, p.nombre AS profesional 
           FROM sucursal_servicio_profesional ssp
           INNER JOIN sucursales s ON s.id = ssp.id_sucursal
           INNER JOIN servicios se ON se.id = ssp.id_servicio
           INNER JOIN profesionales p ON p.id = ssp.id_profesional
           WHERE s.id = 1"; // Solo seleccionar profesionales de la sucursal 1
$resultado2 = mysqli_query($conn, $query2);

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nuestros Servicios</title>
</head>
<body>
	<h1>Nuestros Servicios</h1>
	
	<?php
	// Mostrar la lista de servicios
	while ($fila = mysqli_fetch_array($resultado)) {
		echo '<h2>' . $fila['nombre'] . '</h2>';
		echo '<button onclick="mostrarProfesionales(\'' . $fila['nombre'] . '\')">Ver profesionales disponibles</button>';
	}
	?>

	<div id="profesionales"></div>

	<script>
	function mostrarProfesionales(servicio) {
		// Obtener los profesionales por sucursal y servicio
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// Mostrar los profesionales en la página
				document.getElementById("profesionales").innerHTML = this.responseText;
			}
		};
		xhr.open("GET", "mostrar_profesionales.php?servicio=" + servicio + "&sucursal=1", true); // Solo mostrar profesionales de la sucursal 1
		xhr.send();
	}
	</script>
</body>
</html>