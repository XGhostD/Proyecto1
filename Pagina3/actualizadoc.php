<?php

if(!isset($_REQUEST["id_docente"]) ||
   !isset($_REQUEST["ap_paterno"]) ||
   !isset($_REQUEST["ap_materno"]) ||
   !isset($_REQUEST["especialidad"]) ||
   !isset($_REQUEST["turno"]))
{
    echo"<script>alert('Error, no se obtuvo informacion del Docente XD');window.location.href='docentes.php';</script>";
}

include("conexiond.php");

$cadena = "update docente set id_docente = '" . $_REQUEST["id_docente"] . "', 
                                      ap_paterno = '" . $_REQUEST["ap_paterno"] . "',
                                      ap_materno = '" . $_REQUEST["ap_materno"] . "',
                                      especialidad = '" . $_REQUEST["especialidad"] . "',
                                      turno = '" . $_REQUEST["turno"] . "'
                                     where id_docente =" . $_REQUEST["id_docente"];
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se actualizo al Docente satisfactoriamente.');window.location.href='docentes.php';</script>";
}
else
{
    echo"<script>alert('Oops, un error al actualizar al Docente XD');window.location.href='docentes.php';</script>";
}

$conex->close();
?>