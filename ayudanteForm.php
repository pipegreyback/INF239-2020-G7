<?php include 'db_config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST["rol"];
    $ramo = $_POST["ramo"];
    $sql = "SELECT * FROM alumno WHERE rolalumno like $1";
    $result = pg_query_params($dbconn, $sql, array($rol));
    if (pg_num_rows($result) == 1) {
        $sql = "SELECT * FROM ayudantia WHERE rolayudante like $1 and siglaramo like $2";
        $result = pg_query_params($dbconn, $sql, array($rol, $ramo));
        if (pg_num_rows($result) == 1) {
            echo "El alumno ya tiene esa ayudantia.";
            pg_close($dbconn);
        } else {
            $sql = "SELECT * FROM imparticion WHERE idprofesor = $1 and siglaramo like $2";
            $result = pg_query_params($dbconn, $sql, array($_SESSION["idprofesor"], $ramo));
            if (pg_num_rows($result) == 1) {
                $idayudantia = 1;
                $sql = 'SELECT idayudantia FROM ayudantia';
                $result = pg_query_params($dbconn, $sql, array());
                if (pg_num_rows($result) > 0) {
                    $idayudantia = (pg_num_rows($result) + 1);
                }
                $sql = 'INSERT INTO ayudantia (idayudantia, rolayudante, siglaramo) VALUES ($1, $2, $3)';
                if (pg_query_params($dbconn, $sql, array($idayudantia, $rol, $ramo)) !== FALSE) {
                    header("Location: ayudantesDashboard.php", true, 301);
                    pg_close($dbconn);
                }
            } else {
                echo 'Usted no es el profesor de esa asignatura';
                pg_close($dbconn);
            }
        }
    } else {
        echo 'El rol ingresado no corresponde a ningun alumno';
        pg_close($dbconn);
    }
}
