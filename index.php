<html><body>
<h1>
<?php
// detalles de la conexion
$conn_string = "host=localhost port=5432 dbname=pip user=pip password=Cel097290524";
// establecemos una conexion con el servidor postgresSQL
$dbconn = pg_connect($conn_string);
// Revisamos el estado de la conexion en caso de errores.
if(!$dbconn) {
echo "Error: No se ha podido conectar a la base de datos\n";
} else {
echo "Conexión exitosa!\n";
}
// Cerramos la conexion
pg_close($dbconn);
?>
</h1>
</body></html>