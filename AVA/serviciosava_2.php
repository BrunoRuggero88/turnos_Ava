<?php
// incluir archivo de conexión a la base de datos
include_once('conexion.php');

// consulta SQL para obtener los servicios de la sucursal 2
$servicios_query = "SELECT * FROM servicios WHERE id IN (SELECT id_servicio FROM sucursal_servicio_profesionales WHERE id_sucursal = 2)";

// ejecutar consulta y obtener resultados
$servicios_result = mysqli_query($conn, $servicios_query);

// mostrar título de la página
echo "<h1>Nuestros Servicios</h1>";

// mostrar botones para cada servicio
echo "<div>";
while ($servicio = mysqli_fetch_assoc($servicios_result)) {
  echo "<button onclick='mostrarProfesionales({$servicio['id']}, 2)'>{$servicio['nombre']}</button>";
}
echo "</div>";

// función para mostrar profesionales de un servicio y sucursal
echo "<script>
function mostrarProfesionales(idServicio, idSucursal) {
  // consulta SQL para obtener profesionales de un servicio y sucursal
  var profesionales_query = 'SELECT p.nombre, p.apellido FROM profesionales AS p INNER JOIN sucursal_servicio_profesionales AS ssp ON p.id = ssp.id_profesional WHERE ssp.id_sucursal = ' + idSucursal + ' AND ssp.id_servicio = ' + idServicio;
  
  // ejecutar consulta y obtener resultados
  $.ajax({
    url: 'conexion.php',
    type: 'POST',
    data: {query: profesionales_query},
    success: function(result) {
      // mostrar resultado en un cuadro de diálogo
      alert(result);
    }
  });
}
</script>";

// cerrar conexión a la base de datos
mysqli_close($conn);
?>