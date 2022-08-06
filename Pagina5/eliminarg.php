<?php

if(!isset($_REQUEST["ida"]))
{
//Hacer algo para decir que no funcinó
echo "<script>alert('Error, no se obtuvo ningún alumno para eliminar.');window.location.href='grupos.php';</script>";
die("Error");
}

include("conexiong.php");
$cadena = "delete from grupos where id_grupo = " . $_REQUEST["ida"];

if($conex->query($cadena) === TRUE)
{
echo "<script>alert('Se eliminó el Grupo satisfactoriamente.');window.location.href='grupos.php';</script>";
}
else
{
echo "<script>alert('Oops. hubo un error al eliminar el Grupo ');window.location.href='grupos.php';</script>";
}
$conex->close();

?>