<?php include 'db_config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mission Control</title>
</head>

<main>

    <!-- navbar -->
    <nav>
        <div class="cyan darken-3 nav-wrapper">
            <a href="index.php" class="brand-logo">Mission Control</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="registerDashboard.php">Registro</a></li>
                <li class="active"><a href="misionDashboard.php">Misiones</a></li>
                <li><a href="about.php">Acerca de la tarea</a></li>
            </ul>
        </div>
    </nav>

    <!-- contenido -->
    <div class="container">

        <div class="row">
            <h2>Listado de misiones</h2>
            <hr>
            <div class="col s9">
                <?php
                $sql = "SELECT * FROM mision";
                $result = pg_query_params($dbconn, $sql, array());
                if (pg_num_rows($result) > 0) {
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>ID Mision </th>';
                    echo '<th>ID Profesor </th>';
                    echo '<th>ID alumno</th>';
                    echo '<th>Fecha </th>';
                    echo '<th>Estado </th>';
                    echo '<th>Descripcion </th>';
                    echo '<th>Recompensa </th>';
                    echo '</tr>';
                    while ($row = pg_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>  ' . $row["idmision"] . '</td>';
                        echo '<td>  ' . $row["idprofesor"] . '</td>';
                        echo '<td>  ' . $row["idalumno"] . '</td>';
                        echo '<td>  ' . $row["fechaingreso"] . '</td>';
                        echo '<td>  ' . $row["estado"] . '</td>';
                        echo '<td>  ' . $row["descripcion"] . '</td>';
                        echo '<td>  ' . $row["recompensa"] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    pg_close($dbconn);
                } else {
                    echo "Error al cargar misiones";
                    pg_close($dbconn);
                }
                ?>
            </div>
            <div class="col s3">
                <div class="row">
                    <div class="col s12">
                        <a class="waves-effect waves-light btn" href="/">Añadir Mision</a>
                    </div>

                    <div class="col s12">
                        <a class="waves-effect waves-light btn">Cambiar Estado</a>
                    </div>

                    <div class="col s12">
                        <a class="waves-effect waves-light btn">Cambiar Recompensa</a>
                    </div>

                    <div class="col s12">
                        <a class="waves-effect waves-light btn">Asignar Ayudante</a>
                    </div>

                </div>
            </div>
        </div>


    </div>
</main>
<!-- footer -->

<footer class="cyan darken-3 page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Mission Control</h5>
                <p class="grey-text text-lighten-4">Tarea 2 para el ramo INF239-Bases de datos, primer semestre 2020.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Integrantes</h5>
                <ul>
                    <li class="grey-text text-lighten-3">Jorge Caceres</li>
                    <li class=" grey-text text-lighten-3">Felipe Condon</li>
                    <li class="grey-text text-lighten-3">Roberto Romero</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cyan darken-4 footer-copyright">
    </div>
</footer>

<!-- Javscript dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</html>