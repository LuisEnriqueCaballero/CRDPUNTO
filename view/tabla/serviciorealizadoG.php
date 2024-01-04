<?php
session_start();
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();
$query1=mysqli_query($con,"SELECT * FROM usuario");
    while($ver=mysqli_fetch_array($query1)){
        $usuario=$ver[3];
    }
$query=mysqli_query($con, "SELECT Id_detalle,pa.Id_documento,od.nombre,od.apellido,pa.nombre,pa.apellido,ra.tipo_examen,dv.tipo,dv.Usuario,dv.fecha_registro,dv.Usuario,dv.link,dv.precio FROM detalle_venta as dv 
                                            INNER JOIN radiografia as ra ON dv.id_radiografia=ra.id_radiografia
                                            INNER JOIN paciente as pa ON dv.Id_paciente=pa.Id_documento 
                                            INNER JOIN odontologo as od ON dv.Id_doctor=od.DNI WHERE dv.tipo='CANCELADO' ORDER BY dv.fecha_registro DESC");

?>
<table id="example2" class="table table-bordered text-center table-hover">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Odontologo</th>
            <th>Paciente</th>
            <th>Tipo de examen</th>
            <th>Precio</th>
            <th>Fecha registrado</th>
            <th>Link</th>
            <th>Sede</th>
            <th>Eliminar</th>
            <th>Editar</th>
            <th>Visualizar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $a = 0;
        while ($resultado = mysqli_fetch_array($query)) {

            $a++;
        ?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $resultado[3] . " " . $resultado[2] ?></td>
                <td><?php echo $resultado[5] . " " . $resultado[4] ?></td>
                <td><?php echo $resultado[6] ?></td>
                <td><?php echo $resultado[12] ?></td>
                <td><?php echo $resultado['fecha_registro']?></td>
                <td><?php echo $resultado[11]?></td>
                <!--<td><a href='<?php echo $resultado[11]?>' target="_blank"><?php echo $resultado[11]?></a></td>-->
                <td><?php echo $resultado[10]?></td>
                <td><button class="btn btn-danger" onclick="Eliminarservicio('<?php echo $resultado[0];?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                <td><span class='btn btn-success' data-toggle='modal' data-target='#Editarservicio' onclick="Obtenerdatos('<?php echo $ver[0]?>')"><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
                <td>
                                                        <button type="button" class="userinfo btn btn-successs" data-toggle="modal" data-target="#detalledelexamen" onclick="Detalle(<?php echo $resultado['Id_detalle']?>)">
                                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                                        </button>
                                                    </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example2').DataTable( {
             responsive: 'true',
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend:'excelHtml5',
                        text:'<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                        titleAttr:'Imprimir',
                        className:'btn btn-success'
                },  
                {
                        extend:'pdfHtml5',
                        text:'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                        titleAttr:'Imprimir',
                        className:'btn btn-danger'
                },
                {
                        extend:'excelHtml5',
                        text:'<i class="fa fa-print" aria-hidden="true"></i>',
                        titleAttr:'Imprimir',
                        className:'btn btn-info'
                }

                ],
                "lengthMenu":[[10,25,50,-1], [10,25,50,"All"]]
            // "language":{
            //     "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            // }
        });
    });
</script>