<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Alumnos</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="Imagen1.png">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php include("menu.php"); ?> 

        <!-- Page Content Holder -->
        <div id="content">

        <?php include("header.php"); ?>
            
        <!-- Body -->
        <div class="jumbotron text-center">
            <h2>Alumnos</h2>
        </div>
        <div clas="card">
            <div class="card-body">
            <table class="table table-dark table-striped">
            <thead>
            <tr>
                 <th>ID Alumno</th>
                 <th>Nombre</th>
                 <th>Ap_Paterno</th>
                 <th>Ap_Materno</th>
                 <th>Especialidad</th>
                 <th>Turno</th>
                 <th>Eliminar</th>
                 <th>Editar</th>
                </tr>
            </thead>
            <?php

                include("conexion.php");

             $clausula ="";
             if(isset($_GET["num_control"]))
                     {
                        $clausula = " where alumno.num_control = " . $_GET["num_control"] . " ";
                     }
             $cadena = "select alumno.num_control, alumno.alumno,alumno.ap_paterno, alumno.ap_materno, alumno.especialidad, alumno.turno FROM alumno;"; 

             $resultado = $conex->query($cadena);

             if($resultado->num_rows >0)
             {
                 while($fila = $resultado->fetch_assoc())
                 {
                     //echo $fila["num_control"] . " - " . $fila["nom_alumno"] . "  " . $fila["ap_paterno"] . " - " . $fila["especialidad"] . " - " . $fila["turno"] . "<br>";
                     echo "<tr>
                              <td>" .$fila["num_control"] . "</td>
                              <td>" .$fila["alumno"] . "</td>
                              <td>" .$fila["ap_paterno"] . "</td>
                              <td>" .$fila["ap_materno"] . "</td>
                              <td>" .$fila["especialidad"] . "</td>
                              <td>" .$fila["turno"] . "</td>
                              <td><a onclick=\"return confirm(' Está seguro que desea eliminar el alumno " . $fila["num_control"] ."');\" href='borraalumno.php?ida=" .$fila["num_control"] . "'><i<i class='fas fa-trash-alt'></i></a></td>
                              <td><a href='altaalumno.php?ida=" .$fila["num_control"] . "'><i<i class='fas fa-edit'></i></a></td>
                
                              </tr>";
                 }
             }
             else 
             {
                 echo "<h3>La consulta no trajo ningun resultado </h3>";
             }

             $conex->close();
             ?>
         </table>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>