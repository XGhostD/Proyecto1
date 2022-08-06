<?php

if(!isset($_REQUEST["alumno"]) ||
   !isset($_REQUEST["ap_paterno"]) ||
   !isset($_REQUEST["ap_materno"]) ||
   !isset($_REQUEST["semestre"]) ||
   !isset($_REQUEST["especialidad"]))
{
    echo"<script>alert('Error, no se obtuvo informacion del Alumno :v');window.location.href='alumnos.php';</script>";
}
include("conexion.php");

$cadena = "update alumno set num_control = '" . $_REQUEST["num_control"] . "',
                                      alumno = '" . $_REQUEST["alumno"] . "', 
                                      ap_paterno = '" . $_REQUEST["ap_paterno"] . "',
                                      ap_materno = '" . $_REQUEST["ap_materno"] . "',
                                      semestre = '" . $_REQUEST["semestre"] . "',
                                      especialidad = '" . $_REQUEST["especialidad"] . "'
                                     where num_control =" . $_REQUEST["num_control"];
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se actualizo al alumno satisfactoriamente.');window.location.href='alumnos.php';</script>";
}
else
{
    echo"<script>alert('Oops, un error al actualizar al Alumno:v');window.location.href='alumnos.php';</script>";
}

$conex->close();
?>