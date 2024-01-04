<?php
session_start();
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();
$query1 = mysqli_query($con, "SELECT * FROM odontologo WHERE usuario='$_SESSION[odontologo]'");
while ($ver = mysqli_fetch_array($query1)){
    $dni = $ver[0];
}

?>
<table id="example2" class="table table-bordered table-hover text-left">
    <thead class="thead-dark text-center">
        <tr>
            <th>Dato Paciente</th>
            <th>Historial Clinico</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $query = mysqli_query($con, "SELECT pa.DocumentoI,pa.nombre,pa.apellido,pa.edad,pa.Id_documento FROM detalle_venta dv INNER JOIN paciente pa ON dv.Id_paciente=pa.Id_documento 
        INNER JOIN odontologo od ON dv.Id_doctor=od.DNI WHERE dv.Id_doctor='$dni' GROUP BY pa.Id_documento");
        $a = 0;
        while ($ver=mysqli_fetch_array($query)) {
            
        ?>
            <tr>
                
                <td><?php echo $ver[2]." ".$ver[1] ?></td>
                <td><a href="../view/HistorialPacientes.php?id=<?php echo $ver[4]?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example2').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                }
            });
    });
</script>
