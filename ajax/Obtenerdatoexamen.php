<?php
include_once '../config/conexion.php';
include_once '../class/Obtenerdatoexamen.php';
$obtener= new examen();

echo json_encode($obtener->Obtenerdatos($_POST['id']));
?>