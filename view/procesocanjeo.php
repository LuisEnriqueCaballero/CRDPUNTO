<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['usuario'])) {
    $conectar = new conectar();
    $con = $conectar->conexion();
    
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
                        <div class="card">
                            <div class="card-header">
                                <h2 style="text-align:center;">LISTA DE EXAMENES EN PROCESO DE SER CANJEADO</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="tablacanjeo">
                                    <table id="example" class="table table-bordered table-hover text-center">
                                        <thead  class="thead-dark">
                                            <tr>
                                             <th>#</th>
                                            <th>Numero de dni paciente</th>
                                            <th>Odontologo</th>
                                            <th>Paciente</th>
                                            <th>Tipo de examen radiografico</th>
                                            <th>Tipo</th>
                                            <th>Accion</th>  
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT Id_detalle,pa.Id_documento,od.nombre,od.apellido,pa.nombre,pa.apellido,ra.tipo_examen,dv.tipo FROM detalle_venta as dv 
                                            INNER JOIN radiografia as ra ON dv.id_radiografia=ra.id_radiografia
                                            INNER JOIN paciente as pa ON dv.Id_paciente=pa.Id_documento 
                                            INNER JOIN odontologo as od ON dv.Id_doctor=od.DNI WHERE dv.tipo='PROCESO'";
                                            $query = mysqli_query($con, $sql);
                                            $a = 0;
                                            while ($ver=mysqli_fetch_array($query)) {
                                                $a++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $a; ?></td>
                                                    <td><?php echo $ver[1] ?></td>
                                                    <td><?php echo $ver[3]." ".$ver[2] ?></td>
                                                    <td><?php echo $ver[5]." ".$ver[4] ?></td>
                                                    <td><?php echo $ver[6] ?></td>
                                                    <td><?php echo $ver[7] ?></td>
                                                    <td><a href="editarproceso.php?id=<?php echo $ver[0];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
                    <?php include_once "../temp/finmenu.php" ?>
                    <?php include "../temp/libjs.php" ?>

    </body>

    </html>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?php
} else {
    header("location:login.php");
}
?>