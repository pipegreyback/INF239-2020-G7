<?php include 'db_config.php'; ?>
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
    $sql = "SELECT * FROM ayudante";
    $result = pg_query_params($dbconn, $sql, array());
    if (pg_num_rows($result) > 0) {
        echo '<table style="width:70%" >';
        echo '<tr>';
        echo '<th> Rol </th>';
        echo '<th> Nombre </th>';
        echo '<th> Apellido </th>';
        echo '<th> Cantidad de semestres </th>';
        while ($row = pg_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row["rolayudante"] . '</td>';
            echo '<td>' . $row["nombre"] . '</td>';
            echo '<td>' . $row["apellido"] . '</td>';
            echo '<td>' . $row["cantidadsemestres"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        pg_close($dbconn);
    } else {
        echo "Error al cargar ayudantes";
        pg_close($dbconn);
    }
    echo '<a href="registerAyudante.php"> Ingresar más ayudantes </a> <br>';
    echo '<a href="index.php"> Volver al menu </a> <br>';
    ?>
</body>

</html>