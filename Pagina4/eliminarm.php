<?php

if(!isset($_REQUEST["ida"]))
{
//Hacer algo para decir que no funcinó
echo "<script>alert('Error, no se obtuvo ningún alumno para eliminar.');window.location.href='materia.php';</script>";
die("Error");
}

include("conexionm.php");
$cadena = "delete from materias where id_materia = " . $_REQUEST["ida"];

if($conex->query($cadena) === TRUE)
{
echo "<script>alert('Se eliminó la Materia satisfactoriamente.');window.location.href='materia.php';</script>";
}
else
{
echo "<script>alert('Oops. hubo un error al eliminar la Materia ');window.location.href='materia.php';</script>";
}
$conex->close();

?>