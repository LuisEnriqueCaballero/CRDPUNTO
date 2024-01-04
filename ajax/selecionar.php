<?php
include_once "../config/conexion.php";
include_once "../class/obtenerOdontologosel.php";

$obtenerDatos=new Odontologo();

echo json_encode($obtenerDatos->ObtenerdatOdontologo($_POST['id']));
?>