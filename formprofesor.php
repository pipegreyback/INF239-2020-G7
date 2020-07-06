<?php include 'db_config.php';
session_start();
$_SESSION["usuario"] = $usuario;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProfesor = $_POST["idProfesor"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $especialidad = $_POST["especialidad"];
    if ($usuario == $idProfesor){
        mysql_query("UPDATE Profesor SET nombre = '$nombre', apellido = '$apellido', especialidad = '$especialidad'
        WHERE idProfesor = '$idProfesor'");
        echo "Dato ingresado correctamente <br>";
        pg_close($dbconn);
    } else {
        echo "Usted no puede modificar el archivo";
        pg_close($dbconn);
    }
    
}
