<?php
include_once '../config/conexion.php';
include_once '../class/obtenerproceso.php';
$obtenerdatos=new llenarcampos();

echo json_encode($obtenerdatos->obtenerdatos($_POST['dni']));

?>