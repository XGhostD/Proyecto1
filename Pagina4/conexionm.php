<?php
 $servidor = "localhost"; //puedo poner la IP del servidor en la nube o mi IP privada
 $usuario = "root";
 $contra = ""; //XAMPP se deja vacio el campo; MAMP = "root"   | contraseña particular del servidor
 $base ="escuela";

 $conex = new mysqli($servidor, $usuario, $contra, $base);

 if($conex->connect_error)
 {
     die("Error al conectar la BD" . $conex->connect_error);
 }
?>