
<?php
$host = "localhost"; // dirección del servidor de base de datos
$user = "usuario"; // usuario de la base de datos
$password = "contraseña"; // contraseña de la base de datos
$dbname = "avadb"; // nombre de la base de datos

 $conn=mysqli_connect("localhost","root","","avadb");  //establece conección a la base de datos , guarda la conección en una base de datos
 // Verificar si la conexión se realizó con éxito
 //La función mysqli_connect() es una función de PHP que se utiliza para establecer una conexión con una base de datos MySQL utilizando la extensión MySQL Improved Extension (mysqli).
 //mysqli_connect($host, $user, $password, $database);
 //La función mysqli_connect() devuelve un objeto de conexión a la base de datos si la conexión es exitosa, o FALSE si hay un error. 
 // Si no se especifica una base de datos en la función mysqli_connect(), se puede seleccionar una base de datos posteriormente utilizando la función mysqli_select_db().
if (!$conn) {  
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
    //Si la función "mysqli_connect()" falla (por ejemplo, debido a una contraseña incorrecta), el script se detendrá en la línea
    // que incluye la función "die()" y se mostrará un mensaje de error personalizado. De esta forma, se evita que el script continúe 
    //ejecutándose y causando errores adicionales.
    //mysqli_connect_error() es una función de PHP que devuelve una cadena de texto con la descripción del último error de conexión a la base de datos MySQL
}
//Almacenamiento de contraseñas seguras
//Es importante almacenar las contraseñas de manera segura en la base de datos. 
//Esto significa que no debes almacenar las contraseñas en texto plano, sino que debes almacenar su hash
//Un hash es un valor generado a partir de los datos originales (en este caso, la contraseña)
//y es único para cada conjunto de datos originales. Si alguien obtiene acceso a la base de datos, no podrán ver la contraseña en texto plano, sino que solo verán su hash.
//Para verificar que la contraseña ingresada por el usuario es correcta, debes comparar su hash con el hash almacenado en la base de datos.

//Inicio de sesión y creación de sesió
?>

