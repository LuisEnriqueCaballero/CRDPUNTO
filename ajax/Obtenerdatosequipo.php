<?php
include_once '../config/conexion.php';
include_once '../class/Obtenerdatosequipo.php';
$equipo=new equipo();

echo json_encode($equipo->Obtenerdatos($_POST['idempresa']));
?>