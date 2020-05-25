<?php include 'db_config.php'; ?>

<html>
<h1>Cambiar recompensa de la misión</h1>
<form action="cambiarRecompensaForm.php" method="POST">
    <div class="form-group">
        <label for="idmision">ID de la misión</label>
        <input type="id" class="form-control" name="idmision">
        <label for="idmision">Nueva recompensa de la misión</label>
        <input type="text" class="form-control" name="recompensa">
    </div>


    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<br>
<a href='index.php'>Volver al menú</a>




</html>