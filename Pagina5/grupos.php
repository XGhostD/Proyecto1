<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="shortcut icon" href="Imagen1.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grupos</title>
        <!-- Favicon
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
                <!-- Google fonts-->
                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
                <!-- Font Awesome icons (free version)-->
                <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" /
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="http://localhost/proyecto1/Pagina1.php">Inicio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina2/alumnos.php">Alumnos</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina3/docentes.php">Docentes</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/pagina4/materia.php">Materias</a></li>
                            <li class="nav-item"><a class="nav-link" href=http://localhost/proyecto1/Pagina5/grupos.php>Grupos</a></li>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Registro de Grupos</h1>
                             <!--   <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                                </div>
                              -->
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="rocas.jpg" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                    <h1 class="display-5 fw-bolder text-black mb-2">Registro de Grupos</h1>
                    <br>
                    <table class="table table-striped" style="text-align:center">
                        
                        <tr class="table-info">
                            <th>Id Grupo</th>
                            <th>Nombre del Grupo</th>
                            <th>Semestre</th>
                            <th>Turno</th>
                            <th>Especialidad</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                        </tr>
                        <?php

                       include ("conexiong.php"); 

                       $cadena = "SELECT grupos.id_grupo,
                                         grupos.nombre,
                                         grupos.semestre,
                                         grupos.turno,
                                         grupos.especialidad
                                         FROM grupos;";

                       $resultado = $conex->query($cadena);

                       if ($resultado->num_rows > 0)
                          {
                            while($fila = $resultado->fetch_assoc())
                          {
                      echo "<tr class='table-dark'>
                      
                      <td>" . $fila["id_grupo"] . "</td>
                      <td>" . $fila["nombre"] . "</td>
                      <td>" . $fila["semestre"] . "</td>
                      <td>" . $fila["turno"] . "</td>
                      <td>" . $fila["especialidad"] . "</td>
                      <td><a onclick=\"return confirm(' Está seguro que desea eliminar el Grupo " . $fila["id_grupo"] ."');\" href='eliminarg.php?ida=" .
                      $fila["id_grupo"] . "'><i class='fas fa-trash-alt'></i></a></td>
                      <td><a onclick=\"return confirm(' Está seguro que desea actualizar la Materia " . $fila["id_grupo"] ."');\" href='grupos.php?ida=" .
                      $fila["id_grupo"] . "'><i class='fas fa-edit'></i></a></td>
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
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-black">Registro de Grupos</h2>
                <?php 
        $id_grupo = "";
        $nombre = "";
        $semestre = "";
        $turno = "";
        $especialidad = "";
        $btnguardar = "Guardar Materia";
        $accion = "insertag.php";
        $titulo = "";

        if(isset($_GET["ida"]))
        {
                $id_grupo = $_REQUEST["ida"];

                $accion = "actualizag.php";
                $titulo = "";

                include("conexiong.php");

                $sql = "select * from grupos where id_grupo = " . $id_grupo;
                $resultado = $conex->query($sql);
                if($resultado->num_rows>0)
                {
                        while($fila = $resultado->fetch_assoc())
                        {
                                $id_grupo = $fila["id_grupo"];
                                $nombre= $fila["nombre"];
                                $semestre = $fila["semestre"];
                                $turno = $fila["turno"];
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
        <div class="card-body">
        <form action="<?= $accion ?>" method= "post">
            <div class="form-group">
                <label for="id_grupo">ID Grupo</label>
                <input class="form-control" type="text" id="id_grupo" name="id_grupo"  value="<?= $id_grupo ?>"/>
                
        </div>
        <div class="form-group">
                <label for="nombre"> Nombre del Grupo</label>
                <input class="form-control" type="text" id="nombre" name="nombre"  value="<?= $nombre ?>"/>
        </div>
        <div class="form-group">
                <label for="semestre">Semestre</label>
                <input class="form-control" type="text" id="semestre" name="semestre" value="<?= $semestre ?>"/>
        </div>
        <div class="form-group">
                <label for="turno">Turno</label>
                <input class="form-control" type="text" id="turno" name="turno" value="<?= $turno ?>"/>
        </div>
        <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <input class="form-control" type="text" id="especialidad" name="especialidad" value="<?= $especialidad ?>"/>
        </div>

        <div class = "card-footer">
    <div class= "form-group">
    <input type="submit" value="<?php echo $btnguardar; ?>"  class="btn btn-outline-dark" >
    
</div>
            
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
