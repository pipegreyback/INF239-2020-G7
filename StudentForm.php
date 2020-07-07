<?php include 'db_config.php';
$opciones = array('cost' => 12);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST["rolalumno"];
    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $apellido = $_POST["apellido"];
    $añoingreso = $_POST["añoingreso"];
    $password  = $_POST["password"];
    $password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    $sql = "SELECT * FROM alumno WHERE rolalumno like $1";
    $result = pg_query_params($dbconn, $sql, array($rol));
    if (pg_num_rows($result) == 1) {
        echo "Alumno ya ingresado <br>";
        echo '<a href="alumnosDashboard.php"> Volver al formulario </a> <br>';
    } else {
        error_log("el resultado es " . $result);
        $sql = 'INSERT INTO alumno (rolalumno, nombre, apellido, añoingreso, contraseña) VALUES ($1, $2, $3, $4, $5)';
        if (pg_query_params($dbconn, $sql, array($rol, $nombre, $apellido, $añoingreso, $password)) !== FALSE) {
            echo "Dato ingresado correctamente <br>";
            echo '<a href="listaAlumnos.php"> lista de Alumnos </a> <br>';
            echo '<a href="registerStudent.php"> Ingresar más datos </a> <br>';
            echo '<a href="index.php">Volver al menu</a>' >
                pg_close($dbconn);
        } else {
            echo "Hubo un error al ingresar el dato";
            pg_close($dbconn);
        }
        header("Location: index.php#!", true, 301);
    }
}
