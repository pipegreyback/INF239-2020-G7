<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] = "POST"){
    $idprofesor = $_POST["idprofesor"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $especialidad = $_POST["especialidad"];
    if (pg_query_params($dbconn, $sql, array($idprofesor, $nombre, $apellido, $especialidad)) !== FALSE {
        echo "Dato ingresado correctamente";
        $Sql = 'INSERT INTO profesor (idprofesor, nombre, apellido, especialidad) VALUES ($1, $2, $3, $4)';
        pg_close($dbconn);

    }else{
        echo "Hubo un error al ingresar el dato";
        pg_close($dbconn);
    }

     
        

?>
