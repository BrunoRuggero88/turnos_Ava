<?php

include("ava_db.php");   //conección a la base de datos

//El código siguiente se encarga de procesar un formulario de registro de clientes y guarda los datos en una tabla en la base de datos

if (isset($_POST['register'])) {     //comprueba si el formulario ha sido enviado mediante el bóton de submint de name=register
    if(strlen($_POST['correo'])>=1 && strlen($_POST['numero_documento'])>=1 && strlen($_POST['nombre'])>=1 && strlen($_POST['telefono'])>= 1 && strlen($_POST['fecha-nacimiento']) >=1 && strlen($_POST['contrasena']) >=1){
        //si el formulario ha sido enviado , se comprueba que todos los campos obligatorios del formulario hayan sido completados
        $documento=trim($_POST['numero_documento']); //se guardan en variables los datos de los formulario, trim() se utiliza para limpiar, elimina espacios en blanco y caracteres no deseados
        $correo = trim($_POST['correo']);
        $nombre =trim($_POST['nombre']);
        $telefono =trim($_POST['telefono']);
        $date =trim($_POST['fecha-nacimiento']);
        $contrasena =trim($_POST['contrasena']);
        $consulta="INSERT INTO clientes( numero_documento,nombre, telefono, correo, fecha_nacimiento,contrasena) VALUES ('$documento','$nombre','$telefono','$correo', '$date','$contrasena')";
        //en la variable $consulta, se realiza la consulta SQL para insertar los datos en la tabla "clientes"
        //utliliza las variables para ingresar los datos en la tabla  clientes de la base de datos ava_db
        $resultado =mysqli_query($conn,$consulta); //mysqli_query() ejecuta una consulta en una base de datos MySQL
        //mysqli_query($con, $query);$con es la conexión a la base de datos MySQL y $query es la consulta SQL que se desea ejecutar.
        //La función mysqli_query() devuelve un objeto mysqli_result si la consulta es exitosa, o FALSE si hay un error.
        //La consulta puede ser una consulta de selección (SELECT), una consulta de inserción (INSERT), una consulta de actualización (UPDATE) o una consulta de eliminación (DELETE).
        if ($resultado){ //se comprueba si la consulta se ejecutó correctamente
            ?>
            <h3 class="ok">¡te has inscripto correctamente!</h3>
            <a href="index.php">Ingresar</a>
            <?php
        }else{
            ?>
            <h3 class="bad">¡Ups, ha ocurrido un error!</h3>
            <?php
        }

    } else{  // en caso que los campos no sean llenados saldrá el siguiente mensaje
        ?>
        <h3 class="bad">¡por favor completa bien los campos!</h3>
        <?php
        
    }

}  

if(isset($_POST['ingresar'])){
    // obtenemos los valores del formulario
    $cliente = $_POST['cliente'];
    $contraseña = $_POST['contraseña'];
    
    // creamos la consulta SQL para buscar el cliente en la base de datos
    $sql = "SELECT * FROM clientes WHERE numero_documento = '$cliente' AND contrasena = '$contraseña'";
    
    // ejecutamos la consulta
    $resultado = mysqli_query($conn, $sql);
    
    // verificamos si se encontró el cliente
    if(mysqli_num_rows($resultado) > 0){
        // si se encontró, guardamos su información en la sesión y redireccionamos a la página de sucursales
        $datos_cliente = mysqli_fetch_assoc($resultado);
        $_SESSION['cliente'] = $datos_cliente;
        header("Location: sucursales.php");
    }else{
        // si no se encontró, mostramos un mensaje de error
        echo "No se encontró el cliente en la base de datos";
    }
}
    

?>