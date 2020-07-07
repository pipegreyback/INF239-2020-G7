<?php include 'db_config.php';
session_start();
$opciones = array('cost' => 12);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $professorId = $_POST["professorId"];
    $password  = $_POST["password"];
    $sql = "SELECT * FROM profesor WHERE idprofesor = $1";
    $result = pg_query_params($dbconn, $sql, array($professorId));
    if (pg_num_rows($result) == 1) {
        while ($row = pg_fetch_assoc($result)) {
            $queryPassword = $row["contraseña"];
            $queryName = $row["nombre"];
            $queryId = $row["idprofesor"];
        }
        if (password_verify($password, $queryPassword)) {
            $_SESSION["idprofesor"] = $queryId;
            $_SESSION["nombre"] = $queryName;
            $_SESSION["tipo"] = "profesor";
            header("Location: index.php#!");
            exit();
        } else {
            error_log("Password incorrecta.");
            header("Location: professorHome.php?error=1", true, 301);
        }
    } else {
        error_log("El usuario no existe");
        header("Location: professorHome.php?error=2", true, 301);
    }
}
