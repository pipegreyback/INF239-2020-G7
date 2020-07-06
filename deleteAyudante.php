<?php include 'db_config.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Modificar datos de alumno</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

 

<?php 
$id = $_GET["idAyudantia"];
$sql = "DELETE FROM Ayudantía WHERE idayudantia =".$id;
$result = pg_query_params($dbconn, $sql, array());
echo "<h2>Ayudante eliminado</h2>";
echo "<a href=ayudantesDashboard.php>Volver</a>";
?>
