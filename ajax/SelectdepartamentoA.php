<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$departamento=mysqli_real_escape_string($con,htmlentities($_POST['departamentoA']));

$sql="SELECT idProv, provincia FROM ubprovincia WHERE idDepa='$departamento'";
$resul=mysqli_query($con,$sql);

$cadena= "<option value='0'>Seleccione la provincia</option>";

while($ver=mysqli_fetch_array($resul)){
    $cadena=$cadena."<option value='$ver[0]'>$ver[1]</option>";
}
echo $cadena;
?>