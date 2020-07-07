<?php include 'db_config.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Modificar datos de alumno</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<?php
$rol = $_GET["rolalumno"];
$sql = "SELECT * FROM alumno WHERE rolalumno like $1";
$result = pg_query_params($dbconn, $sql, array($rol));
$student = pg_fetch_assoc($result);

?>

<body>

  <h1 style="color:blue">Modificar datos de alumno</h1>
  <form action="formAlumno.php" method="POST">
    <div class="form-group">
      <label for="rolAlumno">Rol:</label>
      <input type="rolAlumno" class="form-control" name="rolAlumno" placeholder="Ingresa el rol del alumno a modificar" id="rolAlumno" value=<?php echo $rol ?>>
    </div>
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="nombre" class="form-control" name="nombre" placeholder="Ingresa el nombre" id="nombre" value=<?php echo $student["nombre"] ?>>
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:</label>
      <input type="apellido" class="form-control" name="apellido" placeholder="Ingresa el apellido" id="apellido" value=<?php echo $student["apellido"] ?>>
    </div>
    <div class="form-group">
      <label for="añoIngreso">Año de Ingreso:</label>
      <input type="number" class="form-control" name="añoIngreso" placeholder="Ingresa el año de ingreso" id="añoIngreso" value=<?php echo $student["añoingreso"] ?>>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

</body>

</html>