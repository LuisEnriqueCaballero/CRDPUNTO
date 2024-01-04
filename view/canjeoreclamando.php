<?php
session_start();
if (isset($_SESSION['usuario'])) {
  
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
                                <h2 style="text-align:center;">Examen canjeados</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="tablaimplante">
                                    <table id="example" class="table table-bordered table-hover text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th>#</th>
                                            <th>Odontologo</th>
                                            <th>Paciente</th>
                                            <th>Tipo de examen radiografico</th>
                                            <th>Tipo</th>
                                            <th>Archivo</th>
                                            <th>Link</th> 
                                            <th>Visualizar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT Id_detalle,od.nombre,od.apellido,pa.nombre,pa.apellido,ra.tipo_examen,dv.tipo,dv.informe,dv.link FROM detalle_venta as dv 
                                            INNER JOIN radiografia as ra ON dv.id_radiografia=ra.id_radiografia
                                            INNER JOIN paciente as pa ON dv.Id_paciente=pa.Id_documento 
                                            INNER JOIN odontologo as od ON dv.Id_doctor=od.DNI WHERE dv.tipo='CANJEADO'";
                                            $query = mysqli_query($con, $sql);
                                            $a = 0;
                                            while ($ver = mysqli_fetch_array($query)) {
                                                $a++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $a; ?></td>           
                                                    <td><?php echo $ver[2] . " " . $ver[1] ?></td>
                                                    <td><?php echo $ver[4] . " " . $ver[3] ?></td>
                                                    <td><?php echo $ver[5] ?></td>
                                                    <td><?php echo $ver[6] ?></td>
                                                    <td>
                                                    <a href="<?php echo $ver[7] ?>" target="_blank">
                                                        <?php
                                                           if(strlen($ver[7]!='')){
                                                            ?>
                                                           <i class="fa fa-download" aria-hidden="true"> Descargar</i>
                                                           <?php }
                                                            else{
                            
                                                           }?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo $ver[8] ?>" target="_blank">
                                                          <?php
                                                           if(strlen($ver[8]!='')){
                                                            ?>
                                                           <i class="fa fa-external-link" aria-hidden="true"> Ir link</i>
                                                           <?php }
                                                            else{
                            
                                                           }?>
                                                        </a>
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
                    <?php include_once "../temp/finmenu.php" ?>
                    <?php include "../temp/libjs.php" ?>
                    <?php include_once "modal/detalleExamen.php" ?>
                    <script src="../js/verdetalle.js"></script>

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