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
                <li class=""><a href="misionDashboard.php">Misiones</a></li>
                <li><a href="about.php">Acerca de la tarea</a></li>
            </ul>
        </div>
    </nav>

    <!-- contenido -->

    <div class="container">
        <h5>Acceso Rapido</h5>
        <div class="row">
            <div class="col l4 s12">
                <h3>Registro</h3>
                <a href="/profesorDashboard.php" class="waves-effect waves-light btn">Profesores</a>
                <a href="/ayudantesDashboard.php" class="waves-effect waves-light btn">Ayudantes</a>
                <a href="/alumnosDashboard.php" class="waves-effect waves-light btn">Alumnos</a>
            </div>
            <div class="col l8 s12">
                <h3>Misiones</h3>
                <a class="waves-effect waves-light btn">Listado de Misiones</a>
                <a class="waves-effect waves-light btn">Añadir Misión</a>
                <a class="waves-effect waves-light btn">Modificar Estado</a>
                <a class="waves-effect waves-light btn">Modificar Recompensa</a>
                <a class="waves-effect waves-light btn">Añadir Ayudante</a>
            </div>
        </div>
</main>


<body>

    <a href="listaAlumnos.php"> lista de Alumnos </a> <br>
    <a href="registerStudent.php"> Registrar Alumnos </a> <br>
    <br>
    <a href="registerMision.php">Registrar una misión</a><br>
    <a href="registrar_ayu_mision.php">Asignar una misión</a><br>
    <a href="cambiarEstado.php">Cambiar estado de una misión</a><br>
    <a href="cambiarRecompensa.php">Cambiar recompensa de una misión</a><br>
    <a href="misionList.php">Ver misiones</a><br>
    <br>
    <a href="registrar_profesores.php">Registrar profesores</a><br>
    <a href="listProfesores.php">Listar profesores</a><br>

    <a href="registrarAyudante.php">Registrar Ayudante</a><br>
    <a href="listAyudante.php">Listar Ayudante</a><br>
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