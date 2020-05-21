<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProfesor = $_POST["idProfesor"];
    $idAlumno = $_POST["idAlumno"];
    $descripcion = $_POST["descripcion"];
    $recompensa = $_POST["recompensa"];
    $misionID = 1;
    $sql = 'SELECT idmision FROM Mision ';
    $result = pg_query_params($dbconn,$sql,array());
    if (pg_num_rows($result) > 0){
        $misionID = (pg_num_rows($result) + 1);
    }
    $date = date('d/m/Y');
    $setDateStyle = 'SET datestyle = dmy';
    pg_query_params($dbconn,$setDateStyle,array());
    
    

    $sql = 'INSERT INTO Mision (idMision, idProfesor, fechaIngreso,idAlumno, descripcion, recompensa,estado) VALUES ($1, $2, $3, $4, $5,$6,0)';
    if( pg_query_params($dbconn, $sql, array($misionID,$idProfesor,$date,$idAlumno,$descripcion,$recompensa)) !== FALSE ) {
        echo "Dato ingresado correctamente <br>";
        echo '<a href="misionList.php"> lista de Misiones </a> <br>';
        echo '<a href="registerMision.php"> Ingresar más datos </a> <br>';
        echo '<a href="index.php">Volver al menu</a>'>
        pg_close($dbconn);
    } else {
        echo "Hubo un error al ingresar el dato";
        pg_close($dbconn);
    }
}

?>