<?php
session_start();
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();
$query1=mysqli_query($con,"SELECT * FROM usuario WHERE usuario='$_SESSION[usuario]'");
    while($ver=mysqli_fetch_array($query1)){
        $usuario=$ver[3];
    }
$query = mysqli_query($con, "SELECT * FROM paciente ORDER BY date(fecha_registro) ASC");

?>
<table id="example" class="table table-bordered text-center table-hover">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Sede</th>
            <th>Eliminar</th>
            <th>Editar</th>
            <!--<th>Visualizar</th>-->
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
                <td><?php echo $resultado['nombre'] ?></td>
                <td><?php echo $resultado['apellido'] ?></td>
                <td><?php echo $resultado['DocumentoI'] ?></td>
                <td><?php echo $resultado['telefono'] ?></td>
                <td><?php echo $resultado['direccion'] ?></td>
                <td><?php echo $resultado['sede']?></td>
                <td><button class="btn btn-danger" onclick="EliminarDatos(<?php echo $resultado['Id_documento']?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                <td><button class="btn btn-success" data-toggle="modal" data-target="#pacienteactualizar" onclick="Obtenerdatos(<?php echo $resultado['Id_documento']?>)"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                <!--<td><button class="btn btn-primary" data-toggle="modal" data-target="#detallepaciente" onclick="Detalle(<?php echo $resultado['Id_documento']?>)"><i class="fa fa-eye" aria-hidden="true"></i></button></td>-->
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