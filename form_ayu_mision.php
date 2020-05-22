<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] = "POST"){
    $rolAyudante = $_POST["rolAyudante"];
    $idMision = $_POST["idMision"];
    if (pg_query_params($dbconn, $sql, array($rolAyudante, $idMision) !== FALSE {
        echo "Dato ingresado correctamente";
        $Sql = 'INSERT INTO Asignacion (rolAyudante, idMision) VALUES ($1, $2)';
        pg_close($dbconn);

    }else{
        echo "Hubo un error al ingresar el dato";
        pg_close($dbconn);
    }

    


?>
