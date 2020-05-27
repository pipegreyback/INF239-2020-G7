<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idprofesor = $_POST["idprofesor"];
    $idalumno = $_POST["idalumno"];
    $descripcion = $_POST["descripcion"];
    $recompensa = $_POST["recompensa"];
    $misionid = 1;
    $sql = 'SELECT idmision FROM mision ';
    $result = pg_query_params($dbconn, $sql, array());
    if (pg_num_rows($result) > 0) {
        $misionid = (pg_num_rows($result) + 1);
    }
    $date = date('d/m/Y');
    $setDateStyle = 'SET datestyle = dmy';
    pg_query_params($dbconn, $setDateStyle, array());



    $sql = 'INSERT INTO mision (idmision, idprofesor, fechaingreso,idalumno, descripcion, recompensa,estado) VALUES ($1, $2, $3, $4, $5,$6,0)';
    if (pg_query_params($dbconn, $sql, array($misionid, $idprofesor, $date, $idalumno, $descripcion, $recompensa)) !== FALSE) {
        header("Location: misionDashboard.php?exito=1", true, 301);
        pg_close($dbconn);
    } else {
        header("Location: misionDashboard.php?error=1", true, 301);
        pg_close($dbconn);
    }
}
