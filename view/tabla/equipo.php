<?php
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();
$query = mysqli_query($con, "SELECT * FROM equipo");

?>
<table id="example" class="table table-bordered text-center table-hover">
    <thead>
        <thead class="thead-dark">
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th colspan="3">Accion</th>
        </thead>
    </thead>
    <tbody>
        <?php
        $a = 0;
        while ($resultado = mysqli_fetch_array($query)) {
            $a++;
        ?>
            <tr>
                <td><?php echo $a ?></td>
                <td><?php echo $resultado['marca_equipo'] ?></td>
                <td><?php echo $resultado['modelo_equipo'] ?></td>
                <td><?php echo $resultado['precio'] ?></td>

                <td><button class="btn btn-danger" onclick="eliminardato(<?php echo $resultado['id_equipo']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                <td><button class="btn btn-success" data-toggle="modal" data-target="#equipoactualizar" onclick="obtenerdatos(<?php echo $resultado['id_equipo']?>)"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                <td><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>