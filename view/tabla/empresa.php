<?php
include_once "../../config/conexion.php";
$conectar = new conectar();
$con = $conectar->conexion();


?>
<table id="example" class="table table-bordered text-center table-hover">

    <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Nombre del Empresa</th>
          <th>Descripcion</th>
          <th>Eliminar</th> 
          <th>Editar</th>
          <th>Detalle</th>
        </tr>
        
    </thead>

    <tbody>
        <?php
        $a = 0;
        $query = mysqli_query($con, "SELECT id_empresa,nombre,descripcion FROM empresa");
        while ($ver= mysqli_fetch_array($query)) {
           $a++; 
        ?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $ver[1]; ?></td>
                <td><?php echo $ver[2]; ?></td>
                <td><button class="btn btn-danger" onclick="EliminarDatos('<?php echo $ver[0]?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                <td><span class="btn btn-success" data-toggle="modal" data-target="#empresaactualizar" onclick="ObtenerDatos(<?php echo $ver[0]?>)"><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
                <td><span class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></span></td>
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
