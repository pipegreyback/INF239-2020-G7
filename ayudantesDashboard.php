<?php include 'db_config.php';
session_start();
?>
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

    <ul id="dropdown1" class="dropdown-content">
        <li><a href="/alumnosDashboard.php">Alumno</a></li>
        <li class="active"><a href="/ayudantesDashboard.php">Ayudante</a></li>
        <li><a href="/profesorDashboard.php">Profesor</a></li>
    </ul>

    <!-- navbar -->
    <nav>
        <div class="cyan darken-3 nav-wrapper">
            <a href="index.php" class="brand-logo">TUMA II: Electric Boogaloo</a>
            <ul class="right hide-on-med-and-down">
                <?php
                if (isset($_SESSION["nombre"])) {
                    echo '<li>Hola ' . $_SESSION["nombre"] . '</li>';
                }
                ?>
                <?php
                if ($_SESSION["tipo"] == "profesor") {
                ?>
                    <li><a href="professorHome.php">Registro profesores</a></li>

                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Listado<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="misionDashboard.php">Misiones</a></li>
                    <li><a href="about.php">Acerca de la tarea</a></li>
                <?php
                } else if ($_SESSION["tipo"] == "alumno" or $_SESSION["tipo"] == "ayudante") {
                    echo '<li><a href="studentHome.php">Alumno</a></li>';
                }
                ?>
                <?php
                if (isset($_SESSION["nombre"])) {
                    echo '<li><a href="logout.php">Cerrar sesion</a></li>';
                } ?>
            </ul>
        </div>
    </nav>

    <!-- contenido -->
    <?php
    if ($_SESSION["tipo"] == "profesor") {
    ?>
        <div class="container">
            <div class="row">
                <div class="col s12 l6">
                    <?php
                    $usuario = $_SESSION["idprofesor"];
                    $sqlprofe = pg_query_params($dbconn, "SELECT idProfesor FROM Profesor WHERE idProfesor = '$usuario' ", array());

                    if (pg_num_rows($sqlprofe) != 0) {
                        $sql = "SELECT * FROM alumno INNER JOIN ayudantia ON alumno.rolalumno = ayudantia.rolayudante INNER JOIN imparticion ON imparticion.siglaramo = ayudantia.siglaramo WHERE imparticion.idprofesor = '$usuario' ";
                        $result = pg_query_params($dbconn, $sql, array());
                        if (pg_num_rows($result) > 0) {
                            echo '<table style="width:70%" >';
                            echo '<tr>';
                            echo '<th> Rol </th>';
                            echo '<th> Nombre </th>';
                            echo '<th> Apellido </th>';
                            echo '<th> Año de ingreso </th>';
                            echo '<th></th>';
                            echo '<th></th>';
                            while ($row = pg_fetch_assoc($result)) {
                                $rol = $row["rolalumno"];
                                echo '<tr>';
                                echo '<td>' . $row["rolalumno"] . '</td>';
                                echo '<td>' . $row["nombre"] . '</td>';
                                echo '<td>' . $row["apellido"] . '</td>';
                                echo '<td>' . $row["añoingreso"] . '</td>';
                                echo '<td>' . '<a href="modAlumno.php?rolalumno=' . $rol . '">modificar</a>' . '</td>';
                                echo '<td>' . "<a onClick=\"javascript: return confirm('¿Está seguro?');\" href='deleteAyudante.php?idAyudantia=" . $row['idayudantia'] . "'>remover</a>" . '</td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                            pg_close($dbconn);
                        } else if (pg_num_rows($result) == 0) {
                            echo "Aun no hay ayudantes.";
                            pg_close($dbconn);
                        } else {
                            echo "Error al cargar ayudantes";
                            pg_close($dbconn);
                        }
                    } else {
                        echo "<h2>Usuario no autorizado</h2>";
                    }
                    ?>

                </div>
                <div class="col s12 l6">
                    <h3>Registrar Ayudante</h3>
                    <form action="ayudanteForm.php" method="POST">

                        <div class="input-field">
                            <label for="estudiante">rol ayudante</label>
                            <input type="text" class="form-control" name="rol" placeholder="Ingresar rol del ayudante">
                        </div>
                        <div class="input-field">
                            <label for="estudiante">Ramo de ayudantia</label>
                            <input type="text" class="form-control" name="ramo" placeholder="Ingresar nombre del alumno">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</main>
<!-- footer -->

<footer class="cyan darken-3 page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Mission Control</h5>
                <p class="grey-text text-lighten-4">Tarea 3 para el ramo INF239-Bases de datos, primer semestre 2020.</p>
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
<script src="src/js/main.js"></script>

</html>