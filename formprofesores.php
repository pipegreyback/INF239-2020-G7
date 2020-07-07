<?php include 'db_config.php';
$opciones = array('cost' => 12);


if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $password  = $_POST["password"];
    $password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    $especialidad = $_POST["especialidad"];
    $idProfessor = 1;
    $sql = 'SELECT idprofesor FROM profesor';
    $result = pg_query_params($dbconn, $sql, array());
    if (pg_num_rows($result) > 0) {
        $idProfessor = (pg_num_rows($result) + 1);
    }
    $sql = 'INSERT INTO profesor (idprofesor, nombre, apellido, especialidad, contraseña) VALUES ($1, $2, $3, $4, $5)';
    if (pg_query_params($dbconn, $sql, array($idProfessor, $nombre, $apellido, $especialidad, $password)) !== FALSE) {
        header("Location: profesorDashboard.php#!", true, 301);
        pg_close($dbconn);
    } else {
        echo "Hubo un error al ingresar el dato";
        pg_close($dbconn);
    }
    header("Location: profesorDashboard.php#!", true, 301);
}
