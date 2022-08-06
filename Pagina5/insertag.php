<?php

include("conexiong.php");

$cadena = "insert into grupos values('" . $_REQUEST["id_grupo"] . "',
                                      '" . $_REQUEST["nombre"] . "', 
                                      '" . $_REQUEST["semestre"] . "',
                                      '" . $_REQUEST["turno"] . "',
                                      '" . $_REQUEST["especialidad"] . "');";
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se agrego el Grupo Satisfactoriamente');window.location.href='grupos.php';</script>";
}
else
{
    echo"<script>alert('Hubo un error al crear el Grupo XD');window.location.href='grupos.php';</script>";
}

$conex->close();
?>