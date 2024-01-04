<?php
session_start();
include_once '../config/conexion.php';
if (isset($_SESSION['odontologo'])) {
    $conectar = new conectar();
    $con = $conectar->conexion();

    $sql = "SELECT nombre, apellido, fecha, telefono, correo_electronico,clinica,direccion FROM odontologo WHERE usuario='$_SESSION[odontologo]'";
    $query = mysqli_query($con, $sql);
    while ($ver = mysqli_fetch_array($query)) {
        $nombre = $ver[0];
        $apellido = $ver[1];
        $fecha = $ver[2];
        $telefono = $ver[3];
        $correo_electronico = $ver[4];
        $clinica = $ver[5];
        $direccion=$ver[6];
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
        <?php include "../temp1/libcss.php"; ?>
        <title>Document</title>
    </head>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                   
                    <?php include_once "../temp1/sidebar.php" ?>
                    <?php include_once "../temp1/menu.php" ?>
                    <div class="container">
                        <div class="card">
                            <div class="card-header text-center">
                                BIENVENIDO A CRD PUNTO 
                            </div>
                            <div class="card-body">
                                <div class='row align-items-center'>
                                    <div class='col-12 col-md-4'>
                                        <img src='../images/user.jpg' class='img-fluid'>
                                    </div>
                                    <div class='col-12 col-md-8 '>
                                        <h5 class='card-title mb-1 text-center'><span><?php echo $apellido." ".$nombre ?></span></h5>
                                        <p class='mb-0 font-12 font-italic'><span id="cliente_direccion"></span></p>
                                        <hr>
                                        <span  class="fa fa-phone-square" aria-hidden="true"></span><b>Tel&eacute;fono:</b> <span><?php echo "+51 ".$telefono?></span><br>
                                        <span class="fa fa-envelope-o" aria-hidden="true"></span><b>E-Mail:</b> <span><?php echo $correo_electronico?></span><br>
                                        <span class="fa fa-hospital-o" aria-hidden="true"></span><b>Clinica:</b> <span><?php echo $clinica?></span><br>
                                        <span class="fa fa-user-md" aria-hidden="true"></span><b>Profesion:</b> <span>Odontologo</span><br>
                                        <span class="fa fa-map-marker" aria-hidden="true"></span><b>Direccion:</b> <span><?php echo $direccion?></span><br>
                                        <span class="fa fa-calendar" aria-hidden="true"></span><b>Fecha de cumpleaños:</b> <span><?php echo $fecha ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once "../temp1/finmenu.php" ?>
                    <?php include "../temp1/libjs.php" ?>

    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>