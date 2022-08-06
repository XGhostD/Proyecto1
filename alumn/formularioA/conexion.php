<?php
     $servidor = "localhost";
     $usuario = "root";
     $contra = "";
     $base = "escuela";

     $conex = new mysqli($servidor,$usuario,$contra,$base);

     if($conex->connect_error)
     {
         die("Error al conectar la BD" . $conex->connect_error);
     }
?>