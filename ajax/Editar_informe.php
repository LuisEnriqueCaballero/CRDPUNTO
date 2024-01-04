<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$id=$_REQUEST['id'];

if(isset($_POST['Actinforme'])){

    $pdf1=$_FILES['archivo4']['name'];
    $guardado3=$_FILES['archivo4']['tmp_name'];


$carpeta='Archivos/'.$id;
if(!file_exists($carpeta)){
    mkdir($carpeta,0777,true);
    if(file_exists('Archivos')){
        move_uploaded_file($guardado3,$carpeta.'/'.$pdf1);
    }
}else{
        move_uploaded_file($guardado3,$carpeta.'/'.$pdf1);
    }

$sql="UPDATE detalle_venta SET informe='$pdf1' WHERE Id_detalle='$id'";

$query=mysqli_query($con,$sql);

header("location:../view/servicioEditar.php?id=$id");
}
?>