<!DOCTYPE html>
<html>
    <header> <link rel="shortcut icon" href="Imagen1.png"></header>
<?php

include("conexion.php");

$cadena = "insert into alumno values('" . $_REQUEST["num_control"] . "',
                                      '" . $_REQUEST["alumno"] . "', 
                                      '" . $_REQUEST["ap_paterno"] . "',
                                      '" . $_REQUEST["ap_materno"] . "',
                                      '" . $_REQUEST["semestre"] . "',
                                      '" . $_REQUEST["especialidad"] . "',
                                      '" . $_REQUEST["grupo"] . "',
                                      '" . $_REQUEST["turno"] . "',
                                      '" . $_REQUEST["comunidad"] . "',
                                      '" . $_REQUEST["id_grupo"] . "');";

if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se agrego el alumno satisfactoriamente.');window.location.href='lstalumno.php';</script>";
}
else
{
    echo"<script>alert('Hubo un error al crear al Alumno :v');window.location.href='lstalumno.php';</script>";
}

$conex->close();
?>
</html>