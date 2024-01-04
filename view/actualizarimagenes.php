<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['usuario'])) {
$id=intval($_GET['id']);

$conexion=new conectar();
$con=$conexion->conexion();    

$query=mysqli_query($con,"SELECT Id_detalle,imagen1,imagen2,imagen3 FROM detalle_venta WHERE Id_detalle='$id'");

while($ver=mysqli_fetch_array($query)){
    $iddetalle=$ver[0];
    $imagen1=$ver[1];
    $imagen2=$ver[2];
    $imagen3=$ver[3];
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php include "../temp/libcss.php" ?>
        <title>Document</title>
    </head>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    
                    <?php include_once "../temp/sidebar.php" ?>
                    <?php include_once "../temp/menu.php" ?>
                    <div class="container-fluid">
                        <form method="POST" action="../ajax/Editar_imagen.php?id=<?php echo $iddetalle ?>"  enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h2 class="title" style="font-weight:bolder; color:#119FD4">Actualizar Imagenes</h2>
                                </div>
                                <div class="card-body">
                                    <h5>Actualizar Imagens Radiologico</h5>
                                    <hr>
                                    <div class="form-row justify-content-center">
                                        <div class="form-group col-md-4">
                                            <img height="200px" width="200px" src="../ajax/Archivos/<?php echo $iddetalle?>/<?php echo  $imagen1 ?>" alt="">
                                            <input type="file" name="archivo1" id="archivo1" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center">
                                        <div class="form-group col-md-4">
                                            <img height="200px" width="200px" src="../ajax/Archivos/<?php echo $iddetalle?>/<?php echo  $imagen2 ?>" alt="">
                                            <input type="file" name="archivo2" id="archivo2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-center">
                                        <div class="form-group col-md-4">
                                            <img height="200px" width="200px" src="../ajax/Archivos/<?php echo $iddetalle?>/<?php echo  $imagen3 ?>" alt="">
                                            <input type="file" name="archivo3" id="archivo3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <button type="submit" name="ActImagen" id="ActImagen" class="btn btn-outline-info btn-lg">Actualizar</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="servicioEditar.php?id=<?php echo $id?>"><span class="btn btn-outline-info btn-lg">Retonar</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php include_once "../temp/finmenu.php" ?>
                    <?php include "../temp/libjs.php" ?>
                    

    </body>

    </html>



<?php
} else {
    header("location:login.php");
}
?>