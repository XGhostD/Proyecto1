<?php

if(!isset($_REQUEST["id_grupo"]) ||
   !isset($_REQUEST["nombre"]) ||
   !isset($_REQUEST["semestre"]) ||
   !isset($_REQUEST["turno"]) ||
   !isset($_REQUEST["especialidad"]))
{
    echo"<script>alert('Error, no se obtuvo informacion del Grupo XD');window.location.href='grupos.php';</script>";
}

include("conexiong.php");

$cadena = "update grupos set id_grupo = '" . $_REQUEST["id_grupo"] . "', 
                                      nombre = '" . $_REQUEST["nombre"] . "',
                                      semestre = '" . $_REQUEST["semestre"] . "',
                                      turno = '" . $_REQUEST["turno"] . "',
                                      especialidad = '" . $_REQUEST["especialidad"] . "'
                                     where id_grupo =" . $_REQUEST["id_grupo"];
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se actualizo el Grupo satisfactoriamente.');window.location.href='grupos.php';</script>";
}
else
{
    echo"<script>alert('Oops, un error el Grupo la Materia XD');window.location.href='grupos.php';</script>";
}

$conex->close();
?>