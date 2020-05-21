<?php include 'db_config.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Mission Control</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$sql = "SELECT * FROM mision";
$result = pg_query_params($dbconn, $sql, array());
if( pg_num_rows($result) > 0 ) {
    echo '<table style="width:70%" >';
    echo '<tr>';
    echo '<th>ID Mision </th>';
    echo '<th>ID Profesor </th>';
    echo '<th>ID alumno</th>';
    echo '<th>Fecha </th>';
    echo '<th>Estado </th>';
    echo '<th>Descripcion </th>';
    echo '<th>Recompensa </th>';
    echo '</tr>';
    while($row = pg_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>  '.$row["idmision"].'</td>';
        echo '<td>  '.$row["idprofesor"].'</td>';
        echo '<td>  '.$row["idalumno"].'</td>';
        echo '<td>  '.$row["fechaingreso"].'</td>';
        echo '<td>  '.$row["estado"].'</td>';
        echo '<td>  '.$row["descripcion"].'</td>';
        echo '<td>  '.$row["recompensa"].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    pg_close($dbconn);
} else {
    echo "Error al cargar misiones";
    pg_close($dbconn);
}
echo '<a href="registerMision.php"> Ingresar más misiones </a> <br>';
echo '<a href="index.php"> Volver al menu </a> <br>';
?>
</body>
</html> 