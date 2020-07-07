<?php include 'db_config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sigla = $_POST["sigla"];
    $nombre = $_POST["nombre"];
    $creditos = $_POST["creditos"];
    $semestre = $_POST["semestre"];
    $sql = "SELECT * FROM ramo WHERE siglaramo like $1";
    $result = pg_query_params($dbconn, $sql, array($sigla));
    if (pg_num_rows($result) == 1) {
        echo "La asignatura ya existe";
        echo '<a href="registerAsignature.php"> Volver al formulario </a> <br>';
    } else {
        $sql = 'INSERT INTO ramo (siglaramo, nombre, creditossct, semestre) VALUES ($1, $2, $3, $4)';
        if (pg_query_params($dbconn, $sql, array($sigla, $nombre, $creditos, $semestre)) !== FALSE) {
            // header("Location: ayudantesDashboard.php", true, 301);
        } else {
            echo "Hubo un error al ingresar el dato";
            pg_close($dbconn);
        }
        $sql = 'INSERT INTO imparticion (idprofesor, siglaramo) VALUES ($1, $2)';
        if (pg_query_params($dbconn, $sql, array($_SESSION["idprofesor"], $sigla)) !== FALSE) {
            header("Location: index.php", true, 301);
        } else {
            echo "Hubo un error al ingresar el dato";
            pg_close($dbconn);
        }
    }
}
