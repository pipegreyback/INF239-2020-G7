<?php include 'db_config.php'; ?>
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

    <!-- Dropdown -->

    <ul id="dropdown1" class="dropdown-content">
        <li class=""><a href="/alumnosDashboard.php">Alumno</a></li>
        <li><a href="/ayudantesDashboard.php">Ayudante</a></li>
        <li><a href="/profesorDashboard.php">Profesor</a></li>
    </ul>

    <!-- navbar -->
    <nav>
        <div class="cyan darken-3 nav-wrapper">
            <a href="index.php" class="brand-logo">Mission Control</a>
            <ul class="right hide-on-med-and-down">
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Registro<i class="material-icons right">arrow_drop_down</i></a></li>
                <li class="active"><a href="misionDashboard.php">Misiones</a></li>
                <li><a href="about.php">Acerca de la tarea</a></li>
            </ul>
        </div>
    </nav>

    <!-- contenido -->
    <div class="container">

        <div class="row">
            <div class="col s12 l9">
                <h2>Listado de misiones</h2>
                <?php
                $sql = "SELECT * FROM mision";

                $_SESSION["usuario"] =1;
                $usuario = $_SESSION["usuario"];
                $sqlprofe = pg_query_params($dbconn,"SELECT idProfesor FROM Profesor WHERE idProfesor = '$usuario' ",array());
                $sqlayud = pg_query_params($dbconn,"SELECT rolayudante FROM Ayudante WHERE rolayudante = '$usuario' ",array());
                $sqlalumn = pg_query_params($dbconn,"SELECT rolalumno FROM Alumno WHERE rolalumno = '$usuario' ",array());
                if (pg_num_rows($sqlprofe) != 0){
                    $sql = "SELECT * FROM mision WHERE idprofesor=".$usuario;
                }elseif (pg_num_rows($sqlayud) != 0){
                    $sql = "select * from mision inner join asignacion on mision.idmision = asignacion.idmision where asignacion.rolayudante='".$usuario."'";
                }
                
                //Si es alumno y no es ayudante se restringe el acceso
                if(pg_num_rows($sqlalumn)!=0 || pg_num_rows($sqlayud)==0){
                    echo "<h2>Usuario no autorizado</h2>";
                }else {
                    $result = pg_query_params($dbconn, $sql, array());
                    if (pg_num_rows($result) > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>ID Mision </th>';
                        echo '<th>ID Profesor </th>';
                        echo '<th>ID alumno</th>';
                        echo '<th>Fecha </th>';
                        echo '<th>Estado </th>';
                        echo '<th>Descripcion </th>';
                        echo '<th>Recompensa </th>';
                        echo '</tr>';
                        while ($row = pg_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>  ' . $row["idmision"] . '</td>';
                            echo '<td>  ' . $row["idprofesor"] . '</td>';
                            echo '<td>  ' . $row["idalumno"] . '</td>';
                            echo '<td>  ' . $row["fechaingreso"] . '</td>';
                            echo '<td>  ' . $row["estado"] . '</td>';
                            echo '<td>  ' . $row["descripcion"] . '</td>';
                            echo '<td>  ' . $row["recompensa"] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                        pg_close($dbconn);
                    } else if (pg_num_rows($result) == 0) {
                        echo "Aun no hay misiones.";
                        pg_close($dbconn);
                    } else {
                        echo "Error al cargar misiones";
                        pg_close($dbconn);
                    }
            }
                ?>
            </div>
            <div class="col l3 s12">
                <div class="collection">
                    <a class="collection-item" href="/registerMision.php">Añadir Mision</a>
                    <a class="collection-item" href="/cambiarEstado.php">Cambiar Estado</a>
                    <a class="collection-item" href="/cambiarRecompensa.php">Cambiar Recompensa</a>
                    <a class="collection-item" href="/registrar_ayu_mision.php">Asignar Ayudante</a>
                </div>
            </div>
        </div>


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

<script>
    $(document).ready(function() {

        var url_string = window.location.href;
        var url = new URL(url_string);
        var estado = url.searchParams.get("estado");
        var exito = url.searchParams.get("exito");
        var fail = url.searchParams.get("error");
        var edit = url.searchParams.get("edit");
        if (estado == '0') {
            M.toast({
                html: 'El estado  ahora es 0.'
            })
        } else if (estado == '1') {
            M.toast({
                html: 'El estado ahora es 1.'
            })
        }
        if (exito) {
            M.toast({
                html: 'Se ha añadido correctamente el elemento.'
            })
        }
        if (fail) {
            M.toast({
                html: 'No se ha podido ejecutar la operacion.'
            })
        }
        if (edit) {
            M.toast({
                html: 'Se han realizado los cambios.'
            })
        }
    })
</script>

</html>