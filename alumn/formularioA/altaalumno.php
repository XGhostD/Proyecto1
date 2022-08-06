<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CECyTEQ No.83</title>

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
            
        <?php 
        $num_control = "";
        $alumno = "";
        $ap_paterno = "";
        $ap_materno = "";
        $semestre = "";
        $especialidad = "";
        $grupo = "";
        $turno = "";
        $comunidad = "";
        $id_grupo = "";
        $btnguardar = "Guardar alumno";
        $accion = "insertaralumno.php";
        $titulo = "CECyTEQ Alta de Alumnos";

        if(isset($_GET["ida"]))
        {
                $num_control = $_REQUEST["ida"];

                $accion = "actualizaalumno.php";
                $titulo = "CECyTEQ Alta de Alumnos";

                include("conexion.php");

                $sql = "select * from alumno where num_control = " . $num_control;
                $resultado = $conex->query($sql);
                if($resultado->num_rows>0)
                {
                        while($fila = $resultado->fetch_assoc())
                        {
                                $num_control = $fila["num_control"];
                                $alumno = $fila["alumno"];
                                $ap_paterno = $fila["ap_paterno"];
                                $ap_materno = $fila["ap_materno"];
                                $semestre = $fila["semestre"];
                                $especialidad = $fila["especialidad"];
                                $grupo = $fila["grupo"];
                                $turno = $fila["turno"];
                                $comunidad = $fila["comunidad"];
                                $id_grupo = $fila["id_grupo"];
                                $btnguardar = "Actualizar";
                        }
                }
                else
                {
                        //Realizar una accion para modificar el codigo 
                }
        }
        
        ?>
        <div class = "table table-dark table-striped">
        <div class="card-header" style="text-align: center;"><h3><?= $titulo ?></h3></div>
        <div class="card-body">
        <form action="<?= $accion ?>" method= "post">
            <div class="form-group">
                <label for="num_control">ID Alumno</label>
                <input class="form-control" type="text" id="num_control" name="num_control"  value="<?= $num_control ?>"/>
                
        </div>
        <div class="form-group">
                <label for="alumno"> Nombre del Alumno</label>
                <input class="form-control" type="text" id="alumno" name="alumno"  value="<?= $alumno ?>"/>
        </div>
        <div class="form-group">
                <label for="ap_paterno">Apellido Paterno</label>
                <input class="form-control" type="text" id="ap_paterno" name="ap_paterno" value="<?= $ap_paterno ?>"/>
        </div>
        <div class="form-group">
                <label for="ap_materno">Apellido Materno</label>
                <input class="form-control" type="text" id="ap_materno" name="ap_materno" value="<?= $ap_materno ?>"/>
        </div>
        <div class="form-group">
                <label for="semestre">Semestre</label>
                <input class="form-control" type="text" id="semestre" name="semestre" value="<?= $semestre ?>"/>
        </div>
        <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <input class="form-control" type="text" id="especialidad" name="especialidad" value="<?= $especialidad ?>"/>
        </div>
        <div class="form-group">
                <label for="grupo">Grupo</label>
                <input class="form-control" type="text" id="grupo" name="grupo" value="<?= $grupo ?>"/>
        </div>
        <div class="form-group">
                <label for="turno">Turno</label>
                <input class="form-control" type="text" id="turno" name="turno" value="<?= $turno ?>"/>
        </div>
        <div class="form-group">
                <label for="comunidad">Comunidad</label>
                <input class="form-control" type="text" id="comunidad" name="comunidad" placeholder="Escribir Comunidad, Estado y Pais" value="<?= $comunidad ?>"/>
        </div>
        <div class="form-group">
                <label for="id_grupo">ID Grupo</label>
                <input class="form-control" type="text" id="id_grupo" name="id_grupo" placeholder= "Numero de empleado" value="<?= $id_grupo ?>"/>
        </div>
</div>

<div class = "card-footer">
    <div class= "form-group">
    <input type="submit" value="<?php echo $btnguardar; ?>" class="btn btn-primary"  >
    
</div>
        <!-- Body -->
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