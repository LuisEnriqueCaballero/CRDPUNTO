<?php
include_once "../config/conexion.php";
include_once "../class/obtenerproceso1.php";
$odontogo=new ObtenerdatOdontologo();

echo json_encode($odontogo->Odontologo($_POST['dni_odontologo']));
?>