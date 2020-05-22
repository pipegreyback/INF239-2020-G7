<?php include 'db_config.php';?>

<html>
    <form action="form_ayu_mision.php" method="POST">
        <div class="form-group">
          <label for="rolAyudante">rolAyudante</label>
          <input type="rolAyudante" class="form-control" name="rolAyudante" id="rolAyudante">
        </div>
        <div class="form-group">
          <label for="idMision">idMision</label>
          <input type="idMision" class="form-control" name="idMision" id="idMision">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form> 




</html>
