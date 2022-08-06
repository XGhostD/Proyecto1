<?php

include("conexion.php");

$cadena = "insert into alumno values('" . $_REQUEST["num_control"] . "',
                                      '" . $_REQUEST["alumno"] . "', 
                                      '" . $_REQUEST["ap_paterno"] . "',
                                      '" . $_REQUEST["ap_materno"] . "',
                                      '" . $_REQUEST["semestre"] . "'
                                      '" . $_REQUEST["especialidad"] . "');";

if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se agrego el alumno satisfactoriamente.');window.location.href='alumnos.php';</script>";
}
else
{
    echo"<script>alert('Hubo un error al crear al Alumno :v');window.location.href='alumnos.php';</script>";
}

$conex->close();
?>