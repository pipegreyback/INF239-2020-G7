<?php include 'db_config.php'; ?>
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
    <h1 style="color:blue">Registrar Ayudante</h1>
    <form action="ayudanteForm.php" method="POST">

        <div class="form-group">
            <label for="estudiante">rol ayudante</label>
            <input type="text" class="form-control" name="rolayudante" placeholder="Ingresar rol del ayudante">
        </div>
        <div class="form-group">
            <label for="estudiante">Nombre ayudante</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre del alumno">
        </div>
        <div class="form-group">
            <label for="estudiante">Apellido ayudante</label>
            <input type="text" class="form-control" name="apellido" placeholder="Ingresar apellido del alumno">
        </div>
        <div class="form-group">
            <label for="estudiante">cantidad de semestres</label>
            <input type="text" class="form-control" name="semestresqty" placeholder="Ingresar año de ingreso del alumno">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</body>

</html>