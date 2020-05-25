<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $idMision = $_POST["idmision"];
    $recompensa = $_POST["recompensa"];
    $sql = "SELECT 1 FROM mision WHERE idmision=$idMision";
    $result = pg_query_params($dbconn, $sql, array());
    if (pg_num_rows($result) == 1) {
        $sql = "UPDATE mision SET recompensa = $2 WHERE idmision=$1";
        pg_query_params($dbconn, $sql, array($idMision, $recompensa));
        header("Location: http://64.227.96.220/misionDashboard.php?edit=1", true, 301);
        pg_close($dbconn);
    } else {
        header("Location: http://64.227.96.220/misionDashboard.php?error=1", true, 301);
    }
}
