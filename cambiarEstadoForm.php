<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $idMision = $_POST["idmision"];
    $sql = "SELECT 1 FROM mision WHERE idmision=$1";
    $result = pg_query_params($dbconn, $sql, array($idMision));
    if (pg_num_rows($result) == 1) {
        $sql = 'SELECT estado FROM Mision WHERE idmision=$1';
        $result = pg_query_params($dbconn, $sql, array($idMision));
        if (pg_fetch_assoc($result)["estado"] == 0) {
            $sql = 'UPDATE mision SET estado = 1 where idmision=$1';
            pg_query_params($dbconn, $sql, array($idMision));
            $estado = pg_fetch_assoc($result)["estado"];
            header("Location: http://64.227.96.220/misionDashboard.php?estado=1", true, 301);
            pg_close($dbconn);
        } else {
            $sql = 'UPDATE mision SET estado = 0 where idmision=$1';
            pg_query_params($dbconn, $sql, array($idMision));
            $estado = pg_fetch_assoc($result)["estado"];
            header("Location: http://64.227.96.220/misionDashboard.php?estado=0", true, 301);
            pg_close($dbconn);
        }
    } else {
        echo "No existe una mision con el ID indicado<br>";
        echo "<a href='cambiarEstado.php'>Volver a intentar</a><br>";
        echo "<a href='index.php'>Volver al menú</a>";
    }
}
