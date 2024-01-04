<div class="modal fade" id="listaPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Pacientes CRD CLOUD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table id="example" class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Numero Documento</th>
                        <th>Nombre Apellido</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1="SELECT * FROM paciente";
                    $query=mysqli_query($con,$sql1);
                   
                    while($ver=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $ver[15]?></td>
                            <td><?php echo $ver[2]." ".$ver[1]?></td>
                            <td><?php echo $ver[3]?></td>
                            <td><?php echo $ver[6]?></td>
                            <td>
                              <span id="elegir" class="btn btn-success" onclick="seleccionar(<?php echo $ver[0]?>)"><i class="fa fa-share" aria-hidden="true"></i></span>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

