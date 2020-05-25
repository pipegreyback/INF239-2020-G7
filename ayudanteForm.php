<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST["rolayudante"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cantidadsemestres = $_POST["semestresqty"];
    $sql = "SELECT * FROM alumno WHERE rolalumno=$rol LIMIT 1";
    $result = pg_query_params($dbconn, $sql, array());
    if (pg_num_rows($result) == 1) {
        echo "Ayudante ya ingresado <br>";
        echo '<a href="registerAyudante.php"> Volver al formulario </a> <br>';
    } else {


        $sql = 'INSERT INTO ayudante (rolayudante, nombre, apellido, cantidadsemestres) VALUES ($1, $2, $3, $4)';
        if (pg_query_params($dbconn, $sql, array($rol, $nombre, $apellido, $cantidadsemestres)) !== FALSE) {
            header("Location: http://64.227.96.220/ayudantesDashboard.php#!", true, 301);
            pg_close($dbconn);
        } else {
            echo "Hubo un error al ingresar el dato";
            pg_close($dbconn);
        }
    }
}
