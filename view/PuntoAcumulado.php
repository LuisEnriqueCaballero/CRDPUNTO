<?php
session_start();
include_once '../config/conexion.php';
if (isset($_SESSION['odontologo'])) {
    $conectar = new conectar();
    $con = $conectar->conexion();

    $sql = "SELECT nombre, apellido,DNI,bienvenida FROM odontologo WHERE usuario='$_SESSION[odontologo]'";
    $query = mysqli_query($con, $sql);
    while ($ver = mysqli_fetch_array($query)) {
        $nombre = $ver[0];
        $apellido = $ver[1];
        $dni=$ver[2];
        $regalo=$ver[3];
    }
    $sql1=mysqli_query($con,"SELECT dv.id_doctor, dv.punto,pa.nombre,pa.apellido,ra.tipo_examen,dv.fecha_registro FROM detalle_venta dv 
    INNER JOIN odontologo od ON dv.id_doctor=od.DNI
    INNER JOIN paciente pa ON dv.Id_paciente=pa.Id_documento
    INNER JOIN radiografia ra ON dv.Id_radiografia=ra.id_radiografia
    WHERE dv.id_doctor='$dni'");
    while($ver1=mysqli_fetch_array($sql1)){
        $puntoAcumulado=$ver1[1];
        
    }

    $total=$puntoAcumulado+$regalo;
    
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
       
    </head>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                   
                    <?php include_once "../temp1/sidebar.php" ?>
                    <?php include_once "../temp1/menu.php" ?>
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header text-center">
                                <h1 style="letter-spacing: -2px; word-spacing: -2px;
                                color:#1aa5be">BIENVENIDO A CRD CLOUD </h1>
                            </div>
                            <div class="card-body">
                                <h2><i class="fa fa-user-md" aria-hidden="true"></i> <?php echo $apellido." ".$nombre?></h2>
                                <h3>Mis Puntos Acumulado:<p style="color:#1aa5be ; font-size:2em;"><i class="fa fa-star" aria-hidden="true"> <?php echo $total;?>puntos</i></p></h3>
                                <div class="table-responsive" id="tablapunto">
                                    <h4 class="text-center" style="color: #1aa5be; font-size:2em; letter-spacing: -1px;">Mi lista acumulacion de punto</h4>
                                    <table class="table table-active text-center" id="mispuntos">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Datos del pacientes</th>
                                                <th>Examen tomado</th>
                                                <th>Punto ganado</th>
                                                <th>Fecha del examen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $sql2=mysqli_query($con,"SELECT dv.id_doctor, dv.punto,pa.nombre,pa.apellido,ra.tipo_examen,dv.fecha_registro FROM detalle_venta dv 
                                             INNER JOIN odontologo od ON dv.id_doctor=od.DNI
                                             INNER JOIN paciente pa ON dv.Id_paciente=pa.Id_documento
                                             INNER JOIN radiografia ra ON dv.Id_radiografia=ra.id_radiografia
                                             WHERE dv.id_doctor='$dni' order by dv.fecha_registro desc");
                                            $a=0;
                                            while($row=mysqli_fetch_array($sql2)){  
                                                $a++;
                                            ?>      
                                             <tr>
                                                <td><?php echo $a?></td>
                                                <td><?php echo $row[3]." ".$row[2];?></td>
                                                <td><?php echo $row[4];?></td>
                                                <td><?php echo $row[1];?></td>
                                                <td><?php echo $row[5];?></td>
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#mispuntos').DataTable({
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