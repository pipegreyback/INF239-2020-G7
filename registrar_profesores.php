<?php include 'db_config.php';?>

<html>
    <form action="formprofesores.php" method="POST">
        <div class="form-group">
          <label for="idProfesor">idProfesor</label>
          <input type="idProfesor" class="form-control" name="idProfesor" id="idProfesor">
        </div>
        <div class="form-group">
          <label for="nombre">nombre</label>
          <input type="nombre" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">apellido</label>
            <input type="apellido" class="form-control" name="apellido" id="apellido">
          </div>
          <div class="form-group">
            <label for="especialidad">especialidad</label>
            <input type="especialidad" class="form-control" name="especialidad" id="especialidad">
          </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form> 




</html>
