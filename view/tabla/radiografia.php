<?php
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();
$query = mysqli_query($con, "SELECT id_radiografia,tipo_examen,precio,punto_ganado,punto_canjeo FROM radiografia");

?>
<table id="example" class="table table-bordered text-center table-hover">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Tipo de Estudio</th>
            <th>Precio de Examen</th>
            <th>Punto ganado</th>
            <th>Punto Canjeo</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $a = 0;
        while ($resultado = mysqli_fetch_array($query)) {

            $a++;
        ?>
            <tr>
                <td><?php echo $a ?></td>
                <td><?php echo $resultado['tipo_examen'] ?></td>
                <td><?php echo $resultado['precio'] ?></td>
                <td><?php echo $resultado['punto_ganado'] ?></td>
                <td><?php echo $resultado['punto_canjeo'] ?></td>
                <td><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="EliminarTipoexamen(<?php echo $resultado['id_radiografia']?>)"></i></button></td>
                <td><button class="btn btn-success" data-toggle="modal" data-target="#radiologicoActualizar" onclick="ObtenerDatos(<?php echo $resultado['id_radiografia']?>)"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            "language":{
                "url":"//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            }
        });
    });
</script>