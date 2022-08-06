<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="shortcut icon" href="Imagen1.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Materias</title>
        <!-- Favicon
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Google fonts-->
                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="http://localhost/proyecto1/Pagina1.php">Inicio</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina2/alumnos.php">Alumnos</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina3/docentes.php">Docentes</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/pagina4/materia.php">Materias</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/proyecto1/Pagina5/grupos.php">Grupos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                 <!--<img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />-->
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Registro de Materias</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0"></p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Materias</h2>
                <!-- Icon Divider
                
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                   <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                 -->
                    <p>
                    <table class="table table-striped" style="text-align:center">
                        
                                         <tr class="table-info">
                                             <th>Id Materia</th>
                                             <th>Nombre de Materia</th>
                                             <th>H Materia</th>
                                             <th>Tipo Materia</th>
                                             <th>Carrera de Aplicación</th>
                                             <th>Eliminar</th>
                                             <th>Editar</th>
                                         </tr>
                                         <?php

                                        include ("conexionm.php"); 

                                        $cadena = "SELECT materias.id_materia,
                                                          materias.nom_materia,
                                                          materias.h_materia,
                                                          materias.tipo_materia,
                                                          materias.carrera_aplicacion
                                                          FROM materias;";

                                        $resultado = $conex->query($cadena);

                                        if ($resultado->num_rows > 0)
                                           {
                                             while($fila = $resultado->fetch_assoc())
                                           {
                                       echo "<tr class='table-dark'>
                                       
                                       <td>" . $fila["id_materia"] . "</td>
                                       <td>" . $fila["nom_materia"] . "</td>
                                       <td>" . $fila["h_materia"] . "</td>
                                       <td>" . $fila["tipo_materia"] . "</td>
                                       <td>" . $fila["carrera_aplicacion"] . "</td>
                                       <td><a onclick=\"return confirm(' Está seguro que desea eliminar la Materia " . $fila["id_materia"] ."');\" href='eliminarm.php?ida=" .
                                       $fila["id_materia"] . "'><i class='fas fa-trash-alt'></i></a></td>
                                       <td><a onclick=\"return confirm(' Está seguro que desea actualizar la Materia " . $fila["id_materia"] ."');\" href='materia.php?ida=" .
                                       $fila["id_materia"] . "'><i class='fas fa-edit'></i></a></td>
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
                                </p>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Registro de Materias</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <?php 
        $id_materia = "";
        $nom_materia = "";
        $h_materia = "";
        $tipo_materia = "";
        $carrera_aplicacion = "";
        $btnguardar = "Guardar Materia";
        $accion = "insertarm.php";
        $titulo = "";

        if(isset($_GET["ida"]))
        {
                $id_materia = $_REQUEST["ida"];

                $accion = "actualizam.php";
                $titulo = "";

                include("conexionm.php");

                $sql = "select * from materias where id_materia = " . $id_materia;
                $resultado = $conex->query($sql);
                if($resultado->num_rows>0)
                {
                        while($fila = $resultado->fetch_assoc())
                        {
                                $id_materia = $fila["id_materia"];
                                $nom_materia= $fila["nom_materia"];
                                $h_materia = $fila["h_materia"];
                                $tipo_materia = $fila["tipo_materia"];
                                $carrera_aplicacion = $fila["carrera_aplicacion"];
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
                <label for="id_materia">ID Materia</label>
                <input class="form-control" type="text" id="id_materia" name="id_materia"  value="<?= $id_materia ?>"/>
                
        </div>
        <div class="form-group">
                <label for="nom_materia"> Nombre de la Materia</label>
                <input class="form-control" type="text" id="nom_materia" name="nom_materia"  value="<?= $nom_materia ?>"/>
        </div>
        <div class="form-group">
                <label for="h_materia">Horas Materia</label>
                <input class="form-control" type="text" id="h_materia" name="h_materia" value="<?= $h_materia ?>"/>
        </div>
        <div class="form-group">
                <label for="tipo_materia">Tipo de Materia</label>
                <input class="form-control" type="text" id="tipo_materia" name="tipo_materia" value="<?= $tipo_materia ?>"/>
        </div>
        <div class="form-group">
                <label for="carrera_aplicacion">Carrera de Aplicacion</label>
                <input class="form-control" type="text" id="carrera_aplicacion" name="carrera_aplicacion" value="<?= $carrera_aplicacion ?>"/>
        </div>

        <div class = "card-footer">
    <div class= "form-group">
    <input type="submit" value="<?php echo $btnguardar; ?>"  class="btn btn-outline-light" >
    
</div>
                </div>
            </div>
        </section>
           <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
