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

  <div class="container">
    <?php
    if (isset($_SESSION["tipo"])) {
      echo '<h2>Ya estas dentro</h2>';
    } else {
    ?>
      <h2>Bienvenido a TUMA!</h2>
      <h4> Si eres un alumno puedes ingresar sesion o registrarte</h4>
      <div class="row">
        <div class="col s12 l6">
          <h4>Registro</h4>
          <form action="StudentForm.php" method="POST">
            <div class="input-field">
              <label for="estudiante">rol Estudiante</label>
              <input type="text" class="form-control" name="rolalumno" placeholder="Ingresar rol del alumno" id="rolAlumno">
            </div>
            <div class="input-field">
              <label for="estudiante">Contraseña</label>
              <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" id="password">
            </div>
            <div class="input-field">
              <label for="estudiante">Nombre Estudiante</label>
              <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre del alumno" id="nombre">
            </div>
            <div class="input-field">
              <label for="estudiante">Apellido Estudiante</label>
              <input type="text" class="form-control" name="apellido" placeholder="Ingresar apellido del alumno" id="apellido">
            </div>
            <div class="input-field">
              <label for="estudiante">Año de ingreso</label>
              <input type="number" class="form-control" name="añoingreso" placeholder="Ingresar año de ingreso del alumno" id="añoIngreso">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
        <div class="col s12 l6">
          <h4>Iniciar Sesion</h4>
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
        </div>
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
<script>
  $(document).ready(function() {

    var url_string = window.location.href;
    var url = new URL(url_string);
    var fail = url.searchParams.get("error");
    if (fail == 1) {
      M.toast({
        html: 'Password incorrecta'
      })
    } else if (fail == 2) {
      M.toast({
        html: 'Usuario no existe.'
      })
    }
  })
</script>

</html>