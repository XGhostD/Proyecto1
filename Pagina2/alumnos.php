<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="Imagen1.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Alumnos</title>
        <!-- Favicon
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../5/solar/bootstrap.css">
    <link rel="stylesheet" href="../_vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../_vendor/prismjs/themes/prism-okaidia.css">
    <link rel="stylesheet" href="../_assets/css/custom.min.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="http://localhost/proyecto1/Pagina1.php">Inicio</a></li>
                <li class="sidebar-nav-item"><a href="http://localhost/proyecto1/Pagina2/alumnos.php">Alumnos</a></li>
                <li class="sidebar-nav-item"><a href="http://localhost/proyecto1/Pagina3/docentes.php">Docentes</a></li>
                <li class="sidebar-nav-item"><a href="http://localhost/proyecto1/Pagina4/materia.php">Materias</a></li>
                <li class="sidebar-nav-item"><a href="http://localhost/proyecto1/Pagina5/grupos.php">Grupos</a></li>
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Instituto CECyTE No.83</h1>
                <h3 class="mb-5"><em></em></h3>
            <!-- <a class="btn btn-primary btn-xl" href="#about">Find Out More</a> -->
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>Listado Alumnos</h2>
                        <p class="lead mb-5">
                        <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h1>Control Escolar</h1>      
                          <div class="container">
                             <h2>Sistema de Control Escolar Instituto Cecyte</h2>
            
                                     <table class="table table-striped">
                                         <tr class="table-danger">
                                             <th>Id ALumno</th>
                                             <th>Nombre</th>
                                             <th>Ap Paterno</th>
                                             <th>Ap Materno</th>
                                             <th>Semestre</th>
                                             <th>Especialidad</th>
                                             <th>Eliminar</th>
                                             <th>Editar</th>
                                         </tr>
                                         <?php

                                        include ("conexion.php"); 

                                        $cadena = "SELECT alumno.num_control,
                                                          alumno.alumno,
                                                          alumno.ap_paterno,
                                                          alumno.ap_materno,
                                                          alumno.semestre,
                                                          alumno.especialidad
                                                          FROM alumno;";

                                        $resultado = $conex->query($cadena);

                                        if ($resultado->num_rows > 0)
                                           {
                                             while($fila = $resultado->fetch_assoc())
                                           {
                                       echo "<tr class='table-dark'>
                                       
                                       <td>" . $fila["num_control"] . "</td>
                                       <td>" . $fila["alumno"] . "</td>
                                       <td>" . $fila["ap_paterno"] . "</td>
                                       <td>" . $fila["ap_materno"] . "</td>
                                       <td>" . $fila["semestre"] . "</td>
                                       <td>" . $fila["especialidad"] . "</td>
                                       <td><a onclick=\"return confirm(' Está seguro que desea eliminar el alumno " . $fila["num_control"] ."');\" href='eliminar.php?ida=" .
                                       $fila["num_control"] . "'><i class='fas fa-trash-alt'></i></a></td>
                                       <td><a onclick=\"return confirm(' Está seguro que desea actualizar el Alumno " . $fila["num_control"] ."');\" href='alumnos.php?ida=" .
                                       $fila["num_control"] . "'><i class='fas fa-edit'></i></a></td>
                                       </tr>";
                                    }
                                }
                                       else
                                       {
                                        echo"<h3> La consulta no trajo ningun valor, porque la tabla de la BD esta vacia</h3>";
                                    }

                                    $conex->close();
                                    ?>
                   </table>
                </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h1 class="text-secondary mb-0">Registro</h1>

                    <?php 
        $num_control = "";
        $alumno = "";
        $ap_paterno = "";
        $ap_materno = "";
        $semestre = "";
        $especialidad = "";
        $btnguardar = "Guardar Alumno";
        $accion = "insertal.php";
        $titulo = "";

        if(isset($_GET["ida"]))
        {
                $num_control = $_REQUEST["ida"];

                $accion = "actualizal.php";
                $titulo = "";

                include("conexion.php");

                $sql = "select * from alumno where num_control = " . $num_control;
                $resultado = $conex->query($sql);
                if($resultado->num_rows>0)
                {
                        while($fila = $resultado->fetch_assoc())
                        {
                                $num_control = $fila["num_control"];
                                $alumno= $fila["alumno"];
                                $ap_paterno = $fila["ap_paterno"];
                                $ap_materno = $fila["ap_materno"];
                                $semestre = $fila["semestre"];
                                $especialidad = $fila["especialidad"];
                                $btnguardar = "Actualizar";
                        }
                }
                else
                {
                        //Realizar una accion para modificar el codigo 
                }
        }
        
        ?>
        <div class = "table table-striped">
        <div class="card-header" style="text-align: center;"><h3><?= $titulo ?></h3></div>
        <div class="card-body">
        <form action="<?= $accion ?>" method= "post">
            <div class="form-group">
                <label for="num_control">ID Alumno</label>
                <input class="form-control" type="text" id="num_control" name="num_control"  value="<?= $num_control ?>"/>
                
        </div>
        <div class="form-group">
                <label for="alumno">Nombre</label>
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
        <div class = "card-footer">
    <div class= "form-group">
    <input type="submit" value="<?php echo $btnguardar; ?>"  class="btn btn-outline-dark" >
                    
        </section>
        
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
