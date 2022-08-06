<?php

include("conexiond.php");

$cadena = "insert into docente values('" . $_REQUEST["id_docente"] . "',
                                      '" . $_REQUEST["nombre"] . "', 
                                      '" . $_REQUEST["ap_paterno"] . "',
                                      '" . $_REQUEST["ap_materno"] . "',
                                      '" . $_REQUEST["especialidad"] . "',
                                      '" . $_REQUEST["turno"] . "');";
if($conex->query($cadena) === TRUE)
{
    echo "<script>alert('Se agrego el Docente Satisfactoriamente');window.location.href='docentes.php';</script>";
}
else
{
    echo"<script>alert('Hubo un error al crear el Docente XD');window.location.href='docentes.php';</script>";
}

$conex->close();
?>