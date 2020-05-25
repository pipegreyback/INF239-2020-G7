<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $idprofesor = $_POST["idprofesor"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $especialidad = $_POST["especialidad"];
    $sql = 'INSERT INTO profesor (idprofesor, nombre, apellido, especialidad) VALUES ($1, $2, $3, $4)';
    if (pg_query_params($dbconn, $sql, array($idprofesor, $nombre, $apellido, $especialidad)) !== FALSE) {
        header("Location: http://64.227.96.220/profesorDashboard.php#!", true, 301);
        pg_close($dbconn);
    } else {
        echo "Hubo un error al ingresar el dato";
        pg_close($dbconn);
    }
    header("Location: http://64.227.96.220/profesorDashboard.php#!", true, 301);
}
