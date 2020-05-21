<?php include 'db_config.php';?>
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
<h1 style="color:blue">Registrar Alumno</h1>
<form action="StudentForm.php" method="POST">

    <div class="form-group">
      <label for="estudiante">rol Estudiante</label>
      <input type="estudiante" class="form-control" name="rolAlumno" placeholder="Ingresar rol del alumno" id="rolAlumno">
    </div>
    <div class="form-group">
      <label for="estudiante">Nombre Estudiante</label>
      <input type="estudiante" class="form-control" name="nombre" placeholder="Ingresar nombre del alumno" id="nombre">
    </div>
    <div class="form-group">
      <label for="estudiante">Apellido Estudiante</label>
      <input type="estudiante" class="form-control" name="apellido" placeholder="Ingresar apellido del alumno" id="apellido">
    </div>
    <div class="form-group">
      <label for="estudiante">Año de ingreso</label>
      <input type="estudiante" class="form-control" name="añoIngreso" placeholder="Ingresar año de ingreso del alumno" id="añoIngreso">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form> 

</body>
</html> 