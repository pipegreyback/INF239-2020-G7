<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST["rolAlumno"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $añoIngreso = $_POST["añoIngreso"];
    $sql = "SELECT 1 FROM Alumno WHERE rolAlumno=$rol";
    $result = pg_query_params($dbconn,$sql,array());
    if (pg_num_rows($result) == 1) {
        echo "Alumno ya ingresado <br>";
        echo '<a href="registerStudent.php"> Volver al formulario </a> <br>';
    }else {


    $sql = 'INSERT INTO Alumno (rolAlumno, nombre, apellido, añoIngreso) VALUES ($1, $2, $3, $4)';
    if( pg_query_params($dbconn, $sql, array($rol,$nombre,$apellido,$añoIngreso)) !== FALSE ) {
        echo "Dato ingresado correctamente <br>";
        echo '<a href="listaAlumnos.php"> lista de Alumnos </a> <br>';
        echo '<a href="registerStudent.php"> Ingresar más datos </a> <br>';
        echo '<a href="index.php">Volver al menu</a>'>
        pg_close($dbconn);
    } else {
        echo "Hubo un error al ingresar el dato";
        pg_close($dbconn);
    }
}
}
?>