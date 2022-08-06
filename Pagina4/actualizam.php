<?php

if(!isset($_REQUEST["id_materia"]) ||
   !isset($_REQUEST["nom_materia"]) ||
   !isset($_REQUEST["h_materia"]) ||
   !isset($_REQUEST["tipo_materia"]) ||
   !isset($_REQUEST["carrera_aplicacion"]))
{
    echo"<script>alert('Error, no se obtuvo informacion de la Materia XD');window.location.href='materia.php';</script>";
}

include("conexionm.php");

$cadena = "update materias set id_materia = '" . $_REQUEST["id_materia"] . "', 
                                      nom_materia = '" . $_REQUEST["nom_materia"] . "',
                                      h_materia = '" . $_REQUEST["h_materia"] . "',
                                      tipo_materia = '" . $_REQUEST["tipo_materia"] . "',
                                      carrera_aplicacion = '" . $_REQUEST["carrera_aplicacion"] . "'
                                     where id_materia =" . $_REQUEST["id_materia"];
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se actualizo la Materia satisfactoriamente.');window.location.href='materia.php';</script>";
}
else
{
    echo"<script>alert('Oops, un error al actualizar la Materia XD');window.location.href='materia.php';</script>";
}

$conex->close();
?>