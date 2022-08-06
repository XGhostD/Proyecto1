<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="shortcut icon" href="Imagen1.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Docentes</title>
        <!--
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
                <!-- Simple line icons-->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!--Favicon -->
        <link rel="shortcut icon" href="Imagen1.png">

       <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina2/alumnos.php">Alumnos</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina3/docentes.php">Docentes</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina4/materia.php">Materias</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina5/grupos.php">Grupos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-primary bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Registro de Docentes</h1>
                <p class="lead"></p>
            </div>
        </header>
        <!-- About section-->
        <section id="about">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <center>
                        <h2>Registro Docentes</h2>
                        <p class="lead">:3</p>
                        </center>
                        <table class="table table-striped" width="100%">
                                         <tr class="table-secondary">
                                             <th>Id Empleado</th>
                                             <th>Nombre</th>
                                             <th>Ap Paterno</th>
                                             <th>Ap Materno</th>
                                             <th>Especialidad</th>
                                             <th>Turno</th>
                                             <th>Eliminar</th>
                                             <th>Editar</th>
                                         </tr>
                                         <?php

                                        include ("conexiond.php"); 

                                        $cadena = "SELECT docente.id_docente,
                                                          docente.nombre,
                                                          docente.ap_paterno,
                                                          docente.ap_materno,
                                                          docente.especialidad,
                                                          docente.turno
                                                          FROM docente;";

                                        $resultado = $conex->query($cadena);

                                        if ($resultado->num_rows > 0)
                                           {
                                             while($fila = $resultado->fetch_assoc())
                                           {
                                       echo "<tr class='table-dark'>
                                       
                                       <td>" . $fila["id_docente"] . "</td>
                                       <td>" . $fila["nombre"] . "</td>
                                       <td>" . $fila["ap_paterno"] . "</td>
                                       <td>" . $fila["ap_materno"] . "</td>
                                       <td>" . $fila["especialidad"] . "</td>
                                       <td>" . $fila["turno"] . "</td>
                                       <td><a onclick=\"return confirm(' Está seguro que desea eliminar el Docente " . $fila["id_docente"] ."');\" href='eliminard.php?ida=" .
                                       $fila["id_docente"] . "'><i class='fas fa-trash-alt'></i></a></td>
                                       <td><a onclick=\"return confirm(' Está seguro que desea actualizar el Docente " . $fila["id_docente"] ."');\" href='docentes.php?ida=" .
                                       $fila["id_docente"] . "'><i class='fas fa-edit'></i></a></td>
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
        </section>
        <!-- Services section-->
        <section class="bg-black" id="services">
        <?php 
        $id_docente = "";
        $nombre = "";
        $ap_paterno = "";
        $ap_materno = "";
        $semestre = "";
        $especialidad = "";
        $turno = "";
        $btnguardar = "Guardar Docente";
        $accion = "insertardoc.php";
        $titulo = "CECyTEQ Alta de Alumnos";

        if(isset($_GET["ida"]))
        {
                $id_docente = $_REQUEST["ida"];

                $accion = "actualizadoc.php";
                $titulo = "CECyTEQ Alta de Alumnos";

                include("conexiond.php");

                $sql = "select * from docente where id_docente = " . $id_docente;
                $resultado = $conex->query($sql);
                if($resultado->num_rows>0)
                {
                        while($fila = $resultado->fetch_assoc())
                        {
                                $id_docente = $fila["id_docente"];
                                $nombre = $fila["nombre"];
                                $ap_paterno = $fila["ap_paterno"];
                                $ap_materno = $fila["ap_materno"];
                                $especialidad = $fila["especialidad"];
                                $turno = $fila["turno"];
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
                <label for="id_docente">ID Docente</label>
                <input class="form-control" type="text" id="id_docente" name="id_docente"  value="<?= $id_docente ?>"/>
                
        </div>
        <div class="form-group">
                <label for="nombre"> Nombre del Alumno</label>
                <input class="form-control" type="text" id="nombre" name="nombre"  value="<?= $nombre ?>"/>
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
                <label for="especialidad">Especialidad</label>
                <input class="form-control" type="text" id="especialidad" name="especialidad" value="<?= $especialidad ?>"/>
        </div>

        <div class="form-group">
                <label for="turno">Turno</label>
                <input class="form-control" type="text" id="turno" name="turno" value="<?= $turno ?>"/>
        </div>
        <div class = "card-footer">
    <div class= "form-group">
    <input type="submit" value="<?php echo $btnguardar; ?>" class="btn btn-primary"  >
    
</div>
        </section>
        <!-- Contact section-->
       
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Elaborado por Domingo Araujo Alvarez </p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
