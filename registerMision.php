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
<h1 style="color:blue">Registrar Recompensa</h1>
<form action="misionForm.php" method="POST">

    <div class="form-group">
      <label for="mision">ID Profesor</label>
      <input type="id" class="form-control" name="idprofesor" placeholder="Ingresar ID del profesor" id="idProfesor">
    </div>
    <div class="form-group">
      <label for="mision">ID Estudiante</label>
      <input type="id" class="form-control" name="idalumno" placeholder="Ingresar ID del alumno" id="idAlumno">
    </div>
    <div class="form-group">
      <label for="mision">Descripcion</label>
      <input type="text" class="form-control" name="descripcion" placeholder="Descripción" id="descripcion">
    </div>
    <div class="form-group">
      <label for="mision">Recompensa</label>
      <input type="text" class="form-control" name="recompensa" placeholder="Recompensa" id="recompensa">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form> 

</body>
</html> 