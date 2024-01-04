<?php
session_start();
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();
$query1=mysqli_query($con,"SELECT * FROM usuario WHERE usuario='$_SESSION[usuario]'");
    while($ver=mysqli_fetch_array($query1)){
        $usuario=$ver[3];
    }
$query=mysqli_query($con, "SELECT Id_detalle,pa.Id_documento,od.nombre,od.apellido,pa.nombre,pa.apellido,ra.tipo_examen,dv.tipo,dv.Usuario,dv.fecha_registro,dv.informe,dv.link FROM detalle_venta as dv 
                                            INNER JOIN radiografia as ra ON dv.id_radiografia=ra.id_radiografia
                                            INNER JOIN paciente as pa ON dv.Id_paciente=pa.Id_documento 
                                            INNER JOIN odontologo as od ON dv.Id_doctor=od.DNI WHERE dv.tipo='CANCELADO' AND dv.Usuario='$usuario' ORDER BY dv.fecha_registro DESC");

?>
<table id="example2" class="table table-bordered text-center table-hover">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Odontologo</th>
            <th>Paciente</th>
            <th>Tipo de examen</th>
            <th>Pago</th>
            <th>Informe</th>
            <th>Link</th>
            <th>Fecha registrado</th>
            <!-- <th>Eliminar</th>
            <th>Editar</th> -->
            <th>Visualizar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $a = 0;
        while ($resultado = mysqli_fetch_array($query)) {
            $rutaDescargar3="/crdPunto/ajax/Archivos/".$resultado[0]."/".$resultado[10];
            $mostrarArchivo3=$resultado[10];
            $a++;
        ?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $resultado[3] . " " . $resultado[2] ?></td>
                <td><?php echo $resultado[5] . " " . $resultado[4] ?></td>
                <td><?php echo $resultado[6] ?></td>
                <td><?php echo $resultado[7] ?></td>
                <td>
                    <a href="<?php echo $rutaDescargar3?>" download="<?php echo $mostrarArchivo3?>">
                        <?php
                        if(strlen($mostrarArchivo3)!=''){
                            ?><i class="fa fa-download" aria-hidden="true">Informe</i>
                        <?php
                        }else{
                        } 
                        ?>   
                    </a>
                </td>
                <td>
                    <a href="<?php echo $resultado[11] ?>" target="_blank">
                        <?php
                        if(strlen($resultado[11]!='')){
                        ?>
                        <i class="fa fa-external-link" aria-hidden="true"> link</i>
                        <?php }
                        else{
                            
                        }?>
                    </a>
                </td>
                <td><?php echo $resultado[9]?></td>
                <td><button class="btn btn-danger" onclick="Eliminarservicio('<?php echo $resultado[0];?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                <td><a href="servicioEditar.php?id=<?php echo $resultado[0]?>"><span class='btn btn-success'><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td>
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
            "language":{
                "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            }
        });
    });
</script>