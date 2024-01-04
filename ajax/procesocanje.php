<?php
include_once '../config/conexion.php';
$conectar=new conectar();
$con=$conectar->conexion();

$id_radiografia=mysqli_real_escape_string($con,htmlentities($_POST['numero']));
$tipo=mysqli_real_escape_string($con,htmlentities($_POST['tipo']));
$sql="UPDATE detalle_venta SET tipo='$tipo' WHERE Id_detalle='$id_radiografia";

$query=mysqli_query($con,$sql);
if(mysqli_num_rows($query)==1){
    echo 1;
}else{
    echo 0;
}
?>