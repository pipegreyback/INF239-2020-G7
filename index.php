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


    <!-- navbar -->
    <nav>
        <div class="cyan darken-3 nav-wrapper">
            <a href="index.php" class="brand-logo">Mission Control</a>
            <ul class="right hide-on-med-and-down">
                <?php
                if (isset($_SESSION["nombre"])) {
                    echo '<li>Hola ' . $_SESSION["nombre"] . '</li>';
                }
                ?>
                <li><a href="professorHome.php">Profesor</a></li>
                <li><a href="studentHome.php">Alumno</a></li>
                <li><a href="about.php">Acerca de la tarea</a></li>
                <?php
                if (isset($_SESSION["nombre"])) {
                    echo '<li><a href="logout.php">Cerrar sesion</a></li>';
                } ?>
            </ul>
        </div>
    </nav>


    <!-- contenido -->

    <div class="container">
        <?php
        if (isset($_SESSION["tipo"])) {
            echo '<div class="row">';
            echo '<h4>Bienvenido ' . $_SESSION["nombre"] . '</h4>';
            echo '</div>';
            echo '<div class="collection">';
            echo '<a class="collection-item" href="/">Registrar Profesor</a>';
            echo '<a class="collection-item" href="/">Crear asignatura</a>';
            echo '<a class="collection-item" href="/">Registro de ayudantes</a>';
            echo '<a class="collection-item" href="/">Modificar datos</a>';
            echo $_SESSION["tipo"];
            echo '</div>';
        } else {
        ?>
            <h4>Bienvenido a TUMA</h4>
            <p>Ingresa como Profesor o Estudiante</p>
            <div class="row">
                <div class="collection col l6 s12">
                    <h4>Profesor</h4>
                    <p>Iniciar Sesion</p>
                    <form action="professorLogin.php" method="POST">
                        <div class="input-field">
                            <label for="estudiante">id Profesor</label>
                            <input type="text" class="form-control" name="professorId" placeholder="Ingresar id de profesor" id="idProfessor">
                        </div>
                        <div class="input-field">
                            <label for="estudiante">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    <br>
                    <a href="/professorHome.php" class="collection-item">¿No tienes cuenta? Registrar</a>


                </div>
                <div class="collection col l6 s12">
                    <h4>Estudiante</h4>
                    <p>Iniciar Sesion</p>
                    <form action="StudentLogin.php" method="POST">
                        <div class="input-field">
                            <label for="estudiante">rol Estudiante</label>
                            <input type="text" class="form-control" name="rolalumno" placeholder="Ingresar rol del alumno" id="rolAlumno">
                        </div>
                        <div class="input-field">
                            <label for="estudiante">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    <br>
                    <a href="/studentHome.php" class="collection-item">¿No tienes cuenta? Registrar</a>

                </div>
            <?php
        } ?>
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