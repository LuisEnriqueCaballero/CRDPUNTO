<?php
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();
$query = mysqli_query($con, "SELECT DNI,us.nombre, us.apellido,em.nombre,em.logo FROM usuario AS us 
                             INNER JOIN empresa AS em ON us.Id_empresa=em.Id_empresa");

?>
<table id="example" class="table table-bordered text-center table-hover">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre del Administrador</th>
            <th>Usuario</th>
            <th>Empresa</th>
            <th>Eliminar</th>
            <th>Editar</th>
            <th>Detalle</th>
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
                <td><?php echo $resultado[1] ?></td>
                <td><?php echo $resultado[2] ?></td>
                <td><?php echo $resultado[3] ?></td>
                <td><button class="btn btn-danger" onclick="eliminarUsuario(<?php echo $resultado['DNI']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                <td><button class="btn btn-success" data-toggle="modal" data-target="#usuarioactualizar" onclick="ObtenerDato(<?php echo $resultado['DNI']?>)"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
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