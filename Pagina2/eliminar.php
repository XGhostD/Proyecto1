<?php

if(!isset($_REQUEST["ida"]))
{
//Hacer algo para decir que no funcinó
echo "<script>alert('Error, no se obtuvo ningún alumno para eliminar.');window.location.href='alumnos.php';</script>";
die("Error");
}

include("conexion.php");
$cadena = "delete from alumno where num_control = " . $_REQUEST["ida"];

if($conex->query($cadena) === TRUE)
{
echo "<script>alert('Se eliminó el alumno satisfactoriamente.');window.location.href='alumnos.php';</script>";
}
else
{
echo "<script>alert('Oops. hubo un error al eliminar al alumno :V');window.location.href='alumnos.php';</script>";
}
$conex->close();

?>