<?php
include_once "../config/conexion.php";
include_once "../class/ObternerdatoPacienteF.php";

$obtenerDatos=new paciente();

echo json_encode($obtenerDatos->obtenerdatos($_POST['id']));
?>