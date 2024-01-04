<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$provincia=mysqli_real_escape_string($con,htmlentities($_POST['provinciaA']));

$sql="SELECT idDist,distrito FROM ubdistrito WHERE idProv='$provincia'";

$query=mysqli_query($con,$sql);

$cadena="<option val='0'>Seleccione el distrito";

while($ver=mysqli_fetch_array($query)){
    $cadena=$cadena."<option value='$ver[0]'>$ver[1]</option>";
}
echo $cadena;
?>