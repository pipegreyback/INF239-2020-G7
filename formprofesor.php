<?php include 'db_config.php';
session_start();
$usuario = $_SESSION["idprofesor"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProfesor = $_POST["idProfesor"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $especialidad = $_POST["especialidad"];
    if ($usuario == $idProfesor) {
        $sql = "UPDATE Profesor SET nombre = $1, apellido = $2, especialidad = $3 WHERE idProfesor = $4";
        pg_query_params($dbconn, $sql, array($nombre, $apellido, $especialidad, $idProfesor));
        echo "Dato ingresado correctamente <br>";
        pg_close($dbconn);
    } else {
        echo "Usted no puede modificar el archivo";
        pg_close($dbconn);
    }
}
