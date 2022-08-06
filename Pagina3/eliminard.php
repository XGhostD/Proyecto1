<?php

if(!isset($_REQUEST["ida"]))
{
//Hacer algo para decir que no funcinó
echo "<script>alert('Error, no se obtuvo ningún alumno para eliminar.');window.location.href='docentes.php';</script>";
die("Error");
}

include("conexiond.php");
$cadena = "delete from docente where id_docente = " . $_REQUEST["ida"];

if($conex->query($cadena) === TRUE)
{
echo "<script>alert('Se eliminó el Docente satisfactoriamente.');window.location.href='docentes.php';</script>";
}
else
{
echo "<script>alert('Oops. hubo un error al eliminar al Docente ');window.location.href='docentes.php';</script>";
}
$conex->close();

?>