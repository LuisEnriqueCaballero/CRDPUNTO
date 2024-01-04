<?php
session_start();
$id = $_REQUEST['id'];
include_once "../config/conexion.php";
if (isset($_SESSION['odontologo'])) {
    $conectar = new conectar();
    $con = $conectar->conexion();
    $sql = mysqli_query($con, "SELECT * FROM paciente WHERE Id_documento='$id'");
    while ($ver = mysqli_fetch_array($sql)) {
        $dni = $ver[0];
        $nombre = $ver[1];
        $apellido = $ver[2];
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
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="text-align:center;"><?php echo $apellido . " " . $nombre; ?></h2>
                            </div>
                            <div class="card-body">
                                <nav class="navbar navbar-light bg-light">
                                    <a href="listapaciente1.php"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#implanteregistrar">Regresar</button></a>
                                </nav>
                                <div class="table-responsive" id="listaPacientes">
                                    <table id="example2" class="table table-bordered text-center table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo_examne</th>
                                                <th>Descargar informe</th>
                                                <th>ir link</th>
                                                <th>Visualizar las Imagines</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT Id_detalle,ra.tipo_examen,dv.imagen1,dv.imagen2,dv.imagen3,dv.link,dv.fecha_registro,dv.informe,dv.Id_paciente,dv.punto FROM detalle_venta dv 
                                            INNER JOIN radiografia ra on dv.Id_radiografia=ra.id_radiografia 
                                            INNER JOIN paciente pa on dv.Id_paciente=pa.Id_documento WHERE dv.Id_paciente='$dni' AND (dv.tipo='CANCELADO' OR dv.tipo='CANJEADO')");
                                            $a = 0;
                                            while ($ver = mysqli_fetch_array($query)) {
                                                $rutaDescargar = "/crdPunto/ajax/Archivos/" . $ver[0] . "/" . $ver[2];
                                                $rutaDescargar1 = "/crdPunto/ajax/Archivos/" . $ver[0] . "/" . $ver[3];
                                                $rutaDescargar2 = "/crdPunto/ajax/Archivos/" . $ver[0] . "/" . $ver[4];
                                                $rutaDescargar3 = "/crdPunto/ajax/Archivos/" . $ver[0] . "/" . $ver[7];
                                                $mostrarArchivo = $ver[2];
                                                $mostrarArchivo1 = $ver[3];
                                                $mostrarArchivo2 = $ver[4];
                                                $mostrarArchivo3 = $ver[7];
                                                $a++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td><?php echo $ver[1] ?></td>                                       
                                                    <td>
                                                        <?php
                                                        if(strlen($ver[7]!="")){ 
                                                            ?>
                                                            <a href="<?php echo $rutaDescargar3; ?>" download="<?php echo $mostrarArchivo3;?>">
                                                            <span type="button" class="fa fa-archive" aria-hidden="true"></span>
                                                        </a>  
                                                        <?php
                                                        }else{

                                                        }
                                                        ?>
                                                    </td>
                                                    <td><a href="<?php echo $ver[5]?>" target="_blank"><i class="fa fa-file-archive-o" aria-hidden="true"></i></a></td>
                                                    </td>
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
                    <?php include_once "modal/detalleExamen.php" ?>
                    <script src="../js/verdetalle.js"></script>

    </body>

    </html>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example2').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                }
            });
        });
    </script>

<?php
} else {
    header("location:login.php");
}
?>
<!-- ; -->