<?php include 'db_config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Modificar datos de Profesor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <h1 style="color:blue">Modificar datos de Profesor</h1>
    <form action="formProfesor.php" method="POST">
        <div class="form-group">
            <label for="idProfesor">ID:</label>
            <input type="number" class="form-control" name="idProfesor" placeholder="Ingrese su id" id="idProfesor">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="nombre" class="form-control" name="nombre" placeholder="Ingrese su nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="apellido" class="form-control" name="apellido" placeholder="Ingrese su apellido" id="apellido">
        </div>
        <div class="form-group">
            <label for="especialidad">Especialidad:</label>
            <input type="especialidad" class="form-control" name="especialidad" placeholder="Ingrese su especialidad" id="especialidad">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</body>

</html>