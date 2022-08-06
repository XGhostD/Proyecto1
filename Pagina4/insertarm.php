<?php

include("conexionm.php");

$cadena = "insert into materias values('" . $_REQUEST["id_materia"] . "',
                                      '" . $_REQUEST["nom_materia"] . "', 
                                      '" . $_REQUEST["h_materia"] . "',
                                      '" . $_REQUEST["tipo_materia"] . "',
                                      '" . $_REQUEST["carrera_aplicacion"] . "');";
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se agrego el Docente Satisfactoriamente');window.location.href='materia.php';</script>";
}
else
{
    echo"<script>alert('Hubo un error al crear el Docente XD');window.location.href='materia.php';</script>";
}

$conex->close();
?>