<?php
include_once "../config/conexion.php";
$conectar=new conectar();
$con=$conectar->conexion();

$id=$_REQUEST['id'];

if(isset($_POST['ActImagen'])){
$imagen1=$_FILES['archivo1']['name'];
$imagen2=$_FILES['archivo2']['name'];
$imagen3=$_FILES['archivo3']['name'];
$guardado=$_FILES['archivo1']['tmp_name'];
$guardado1=$_FILES['archivo2']['tmp_name'];
$guardado2=$_FILES['archivo3']['tmp_name'];
$carpeta='Archivos/'.$id;
if(!file_exists($carpeta)){
    mkdir($carpeta,0777,true);
    if(file_exists('Archivos')){
        move_uploaded_file($guardado,$carpeta.'/'.$imagen1);
        move_uploaded_file($guardado1,$carpeta.'/'.$imagen2);
        move_uploaded_file($guardado2,$carpeta.'/'.$imagen3);
       
    }
}else{
        move_uploaded_file($guardado,$carpeta.'/'.$imagen1);
        move_uploaded_file($guardado1,$carpeta.'/'.$imagen2);
        move_uploaded_file($guardado2,$carpeta.'/'.$imagen3);
        
    }

$sql="UPDATE detalle_venta SET imagen1='$imagen1', imagen2='$imagen2', imagen3='$imagen3' WHERE Id_detalle='$id'";

$query=mysqli_query($con,$sql);

header("location:../view/servicioEditar.php?id=$id");
}
?>