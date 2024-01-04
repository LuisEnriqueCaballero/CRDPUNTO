<?php
include_once '../config/conexion.php';
include_once '../class/ObtenerdatosOdontologo.php';
$odontologo=new Odontologo();

echo json_encode($odontologo->obtenerdatos($_POST['idodontologo']));
?>