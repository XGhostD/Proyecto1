<?php

if(!isset($_REQUEST["alumno"]) ||
   !isset($_REQUEST["ap_paterno"]) ||
   !isset($_REQUEST["ap_materno"]) ||
   !isset($_REQUEST["semestre"]) ||
   !isset($_REQUEST["especialidad"]) ||
   !isset($_REQUEST["grupo"]) ||
   !isset($_REQUEST["turno"]) ||
   !isset($_REQUEST["comunidad"]) ||
   !isset($_REQUEST["id_grupo"]))
{
    echo"<script>alert('Error, no se obtuvo informacion del Alumno :v');window.location.href='enlistaralumno.php';</script>";
}
include("conexion.php");

$cadena = "update alumno set num_control = '" . $_REQUEST["num_control"] . "',
                                      alumno = '" . $_REQUEST["alumno"] . "', 
                                      ap_paterno = '" . $_REQUEST["ap_paterno"] . "',
                                      ap_materno = '" . $_REQUEST["ap_materno"] . "',
                                      semestre = '" . $_REQUEST["semestre"] . "',
                                      especialidad = '" . $_REQUEST["especialidad"] . "',
                                      grupo = '" . $_REQUEST["grupo"] . "',
                                      turno = '" . $_REQUEST["turno"] . "',
                                      comunidad = '" . $_REQUEST["comunidad"] . "',
                                      id_grupo = '" . $_REQUEST["id_grupo"] . "'
                                     where num_control =" . $_REQUEST["num_control"];
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se actualizo al alumno satisfactoriamente.');window.location.href='enlistaralumno.php';</script>";
}
else
{
    echo"<script>alert('Oops, un error al actualizar al Alumno:v');window.location.href='enlistaralumno.php';</script>";
}

$conex->close();
?>