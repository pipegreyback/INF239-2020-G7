<?php include 'db_config.php';
session_start();
if ($_SESSION["tipo"] == "profesor") {
    $usuario = $_SESSION["idprofesor"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rolAlumno = $_POST["rolAlumno"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $añoIngreso = $_POST["añoIngreso"];
        $sql = "UPDATE alumno SET nombre = $1, apellido = $2, añoingreso = $3 WHERE rolalumno like $4";
        pg_query_params($dbconn, $sql, array($nombre, $apellido, $añoIngreso, $rolAlumno));
        echo "Dato ingresado correctamente <br>";
        echo $_SESSION["tipo"];
        pg_close($dbconn);
    }
} else {
    $usuario = $_SESSION["rol"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rolAlumno = $_POST["rolAlumno"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $añoIngreso = $_POST["añoIngreso"];
        if ($usuario == $rolAlumno) {
            $sql = "UPDATE alumno SET nombre = $1, apellido = $2, añoingreso = $3 WHERE rolalumno like $4";
            pg_query_params($dbconn, $sql, array($nombre, $apellido, $añoIngreso, $rolAlumno));
            echo "Dato ingresado correctamente <br>";
            pg_close($dbconn);
        } else {
            echo "Usted no puede modificar el archivo";
            pg_close($dbconn);
        }
    }
}
