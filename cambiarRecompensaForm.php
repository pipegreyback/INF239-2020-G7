<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $idMision = $_POST["idmision"];
    $recompensa = $_POST["recompensa"];
    $sql = "SELECT 1 FROM mision WHERE idmision=$idMision";
    $result = pg_query_params($dbconn, $sql, array());
    if (pg_num_rows($result) == 1) {
        $sql = "UPDATE mision SET recompensa = $2 WHERE idmision=$1";
        pg_query_params($dbconn, $sql, array($idMision, $recompensa));
        echo "Estado de la mision #" . $idMision . " ha cambiado con exito a " . $recompensa . "<br>";
        echo "<a href='index.php'>Volver al menú</a>";
        pg_close($dbconn);
    } else {
        echo "No existe una mision con el ID indicado<br>";
        echo "<a href='cambiarRecompensa.php'>Volver a intentar</a><br>";
        echo "<a href='index.php'>Volver al menú</a>";
    }
}
