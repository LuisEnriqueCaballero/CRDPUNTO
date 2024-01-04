<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['odontologo'])) {
    $conectar = new conectar();
    $con = $conectar->conexion();
    $query = mysqli_query($con, "SELECT * FROM odontologo WHERE usuario='$_SESSION[odontologo]'");
    while ($datos = mysqli_fetch_row($query)) {
        $id_doctor = $datos[0];
    }

include_once "modal/detalleExamen.php";
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
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="text-align:center;">MI LISTA DE PACIENTE ATENDIDO</h2>
                            </div>
                            <div class="card-body">
                                <nav class="navbar navbar-light bg-light">
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#implanteregistrar"><i class="fa fa-user-plus" aria-hidden="true"></i></button>

                                    <form class="form-inline">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar implante" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </nav>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-center">
                                        <thead class="thead-dark">
                                            <th>#</th>
                                            <th>Datos Paciente</th>
                                            <th>Tipo Examen</th>
                                            <th>Punto Ganado</th>
                                            <th>Imagen1</th>
                                            <th>Imagen2</th>
                                            <th>Imagen3</th>
                                            <th>Informe</th>
                                            <th>Link</th>
                                            <th>Visualizar</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $a = 0;
                                            $query1 = mysqli_query($con, "SELECT Id_detalle ,dv.punto,ra.tipo_examen,pa.nombre,pa.apellido,dv.Id_doctor,dv.link,dv.imagen1,dv.imagen2,dv.imagen3,dv.informe FROM detalle_venta as dv 
                                                                          INNER JOIN odontologo as od ON dv.Id_doctor=od.DNI
                                                                          INNER JOIN radiografia as ra ON dv.id_radiografia=ra.id_radiografia
                                                                          INNER JOIN paciente as pa ON dv.Id_paciente=pa.Id_documento
                                                                          WHERE dv.Id_doctor='$id_doctor'");
                                            while ($ver = mysqli_fetch_array($query1)) {
                                                $rutaDescargar="../ajax/Archivos/".$ver[0]."/".$ver[7];
            $rutaDescargar1="../ajax/Archivos/".$ver[0]."/".$ver[8];
            $rutaDescargar2="../ajax/Archivos/".$ver[0]."/".$ver[9];
            $rutaDescargar3="../ajax/Archivos/".$ver[0]."/".$ver[10];
            $mostrarArchivo=$ver[7];
            $mostrarArchivo1=$ver[8];
            $mostrarArchivo2=$ver[9];
            $mostrarArchivo3=$ver[10];
                                                $a++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td><?php echo $ver[4] . " " . $ver[3] ?></td>
                                                    <td><?php echo $ver[2] ?></td>
                                                    <td><?php echo $ver[1] ?></td>
                                                    <td>
                    <a href="<?php echo $rutaDescargar;?>" download="<?php echo $mostrarArchivo?>">
                        <button class="btn btn-secondary">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </button>
                    </a>
                    
                </td>
                
                <td>
                  
                    <a href="<?php echo $rutaDescargar1;?>" download="<?php echo $mostrarArchivo1?>">
                        <button class="btn btn-secondary">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </button>
                    </a>
                    
                </td>
                   
                   <td>
                   
                    <a href="<?php echo $rutaDescargar2;?>" download="<?php echo $mostrarArchivo2?>">
                        <button class="btn btn-secondary">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </button>
                    </a>
                   
                    
                </td>
                                                    <td>
                    <a href="<?php echo $rutaDescargar3;?>" download="<?php echo $mostrarArchivo3?>">
                        <button class="btn btn-danger">
                            <i class="fa fa-file-pdf-o" aria-hidden="true">
                            </i>
                        </button>
                    </a>
                    
                </td>
                                                    <td><a href="<?php echo $ver[6]?>" target="_blank"><?php echo $ver[6]?></a></td>
                                                    <td>
                                                        <button type="button" class="userinfo btn btn-successs" data-toggle="modal" data-target="#detalledelexamen" onclick="Detalle(<?php echo $ver['Id_detalle']?>)">
                                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php include_once "../temp1/finmenu.php" ?>
                    <?php include "../temp1/libjs.php" ?>

    </body>

    </html>
    <script src="../js/verdetalle.js"></script>
    
<?php
} else {
    header("location:login.php");
}
?>