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


    <!-- Dropdown -->

    <ul id="dropdown1" class="dropdown-content">
        <li class=""><a href="/alumnosDashboard.php">Alumno</a></li>
        <li><a href="/ayudantesDashboard.php">Ayudante</a></li>
        <li><a href="/profesorDashboard.php">Profesor</a></li>
    </ul>

    <!-- navbar -->
    <nav>
        <div class="cyan darken-3 nav-wrapper">
            <a href="index.php" class="brand-logo">Mission Control</a>
            <ul class="right hide-on-med-and-down">
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Registro<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="misionDashboard.php">Misiones</a></li>
                <li><a href="about.php">Acerca de la tarea</a></li>
            </ul>
        </div>
    </nav>


    <!-- contenido -->

    <div class="container">
        <h5>Acceso Rapido</h5>
        <div class="row">
            <div class="collection col l6 s12">
                <h3>Registros</h3>
                <a href="/ayudantesDashboard.php" class="collection-item">Ayudantes</a>
                <a href="/profesorDashboard.php" class="collection-item">Profesores</a>
                <a href="/alumnosDashboard.php" class="collection-item">Alumnos</a>

            </div>
            <div class="collection col l6 s12">
                <h3>Misiones</h3>
                <a href="/misionDashboard.php" class="collection-item">Listado de Misiones</a>
                <a href="/registerMision.php" class="collection-item">Añadir Misión</a>
                <a href="/cambiarEstado.php" class="collection-item">Modificar Estado</a>
                <a href="/cambiarRecompensa.php" class="collection-item">Modificar Recompensa</a>
                <a href="/registrar_ayu_mision.php" class="collection-item">Añadir Ayudante</a>
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
<script src="src/js/main.js"></script>

</html>