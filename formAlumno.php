<?php include 'db_config.php';
session_start();
$usuario = $_SESSION["usuario"];
$sqlprofe = mysql_query("SELECT idProfesor FROM Profesor WHERE idProfesor = '$usuario' ");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rolAlumno = $_POST["rolAlumno"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $añoIngreso = $_POST["añoIngreso"];
    if (($usuario == $rolAlumno) or ($sqlprofe != FALSE)){
        mysql_query("UPDATE Alumno SET nombre = '$nombre', apellido = '$apellido', añoIngreso = '$añoIngreso'
        WHERE rolAlumno = '$rolAlumno'");
        echo "Dato ingresado correctamente <br>";
        pg_close($dbconn);
    } else {
        echo "Usted no puede modificar el archivo";
        pg_close($dbconn);
    }
    
}
?>
