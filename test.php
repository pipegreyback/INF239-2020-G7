<?php include 'db_config.php';

$sql = "SELECT * FROM alumno WHERE rolalumno like '201303018-1'";
$result = pg_query_params($dbconn, $sql, array());
echo $result . "\n";
echo pg_num_rows($result);
