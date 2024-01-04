<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['usuario'])) {
    $conectar=new conectar();
    $con=$conectar->conexion();
    
    $sql="SELECT us.usuario,us.nombre,us.apellido,em.nombre,us.foto FROM usuario as us INNER JOIN empresa as em on us.Id_empresa=em.id_empresa  WHERE us.usuario='$_SESSION[usuario]'";
    $query=mysqli_query($con,$sql);
    while($ver=mysqli_fetch_array($query)){
        $nombre=$ver[1];
        $apellido=$ver[2];
        $empresa=$ver[3];
        $foto=$ver[4];
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
        
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Outfit&family=Ubuntu:wght@500;700&display=swap" rel="stylesheet">
        
        <title>CRD CLOUD - Inicio</title>
    </head>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    
                    <?php include_once "../temp/sidebar.php" ?>
                    <?php include_once "../temp/menu.php" ?>
                    <div class="container">
                        <div class="card">
                        
                            <div class="card-header text-center" style="font-family: 'Ubuntu', sans-serif;">
                                BIENVENIDO A CRD CLOUD
                            </div>
                            <div class="card-body">
                                <div class='row align-items-center'>
                                    <div class='col-12 col-md-4'>
                                        <img src='../imgtrabajdores/<?php echo $foto?>' class='img-fluid'>
                                    </div>
                                    <div class='col-12 col-md-8 '>
                                        <h5 class='card-title mb-1 text-center'><span><?php echo $apellido . " " . $nombre?></span></h5>
                                        <p class='mb-0 font-12 font-italic'><span id="cliente_direccion"></span></p>
                                        <hr>
                                        <span class="fa fa-phone-square" aria-hidden="true"></span><b>Empresa:</b> <span><?php echo $empresa ?></span><br>
                                        <!-- <span class="fa fa-envelope-o" aria-hidden="true"></span><b>E-Mail:</b> <span></span><br>
                                        <span class="fa fa-hospital-o" aria-hidden="true"></span><b>Clinica:</b> <span></span><br>
                                        <span class="fa fa-user-md" aria-hidden="true"></span><b>Profesion:</b> <span>Odontologo</span><br>
                                        <span class="fa fa-map-marker" aria-hidden="true"></span><b>Direccion:</b> <span></span><br>
                                        <span class="fa fa-calendar" aria-hidden="true"></span><b>Fecha de cumpleaños:</b> <span></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once "../temp/finmenu.php" ?>
                    <?php include "../temp/libjs.php" ?>
                    <?php
                    include_once "modal/registrarEmpresa.php";
                    include_once "modal/editarEmpresa.php";
                    ?>

    </body>

    </html>
    <script type="text/javascript">
    alertify.success('Bienvenido a CRD <?php echo $apellido." ".$nombre?>');
    </script> 
<?php
} else {
    header("location:login.php");
}
?>