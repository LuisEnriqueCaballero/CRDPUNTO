<?php
include_once "../config/conexion.php";
include_once "../class/obtenerdatos.php";

$paciente=new ObtenerDatos();

echo json_encode($paciente->obtenerdato($_POST['idPaciente']));
?>