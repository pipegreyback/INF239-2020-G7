<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $rolAyudante = $_POST["rolAyudante"];
    $idMision = $_POST["idMision"];
    $sql = "SELECT 1 FROM mision WHERE idmision=$idMision";
    $result = pg_query_params($dbconn, $sql, array());
    if (pg_num_rows($result) == 1) {
        $sql = 'INSERT INTO Asignacion (rolAyudante, idMision) VALUES ($1, $2)';
        if (pg_query_params($dbconn, $sql, array($rolAyudante, $idMision)) !== FALSE) {
            echo "Dato ingresado correctamente";
            pg_close($dbconn);
        } else {
            echo "Hubo un error al ingresar el dato";
            pg_close($dbconn);
        }
    } else {
        echo "No existe una mision con el ID indicado<br>";
    }
}
