<?php include 'db_config.php';
session_start();
$opciones = array('cost' => 12);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST["rolalumno"];
    $password  = $_POST["password"];
    $sql = "SELECT * FROM alumno WHERE rolalumno like $1";
    $result = pg_query_params($dbconn, $sql, array($rol));
    if (pg_num_rows($result) == 1) {
        while ($row = pg_fetch_assoc($result)) {
            $queryPassword = $row["contraseña"];
            $queryName = $row["nombre"];
            $queryId = $row["rolalumno"];
        }
        if (password_verify($password, $queryPassword)) {
            $_SESSION["rol"] = $queryId;
            $_SESSION["nombre"] = $queryName;
            $sql = "SELECT * FROM ayudantia WHERE rolayudante like $1";
            $result = pg_query_params($dbconn, $sql, array($rol));
            if (pg_num_rows($result) >= 1) {
                $_SESSION["tipo"] = "ayudante";
            } else {
                $_SESSION["tipo"] = "alumno";
            }
            header("Location: index.php#!");
            exit();
        } else {
            error_log("Password incorrecta.");
            header("Location: studentHome.php?error=1", true, 301);
        }
    } else {
        error_log("El usuario no existe");
        header("Location: studentHome.php?error=2", true, 301);
    }
}
