<?php
include_once '../config/conexion.php';
include_once '../class/Obtenerdatopaciente.php';
$obtener=new paciente();

echo json_encode($obtener->obtenerdatos($_POST['idpaciente']));
?>