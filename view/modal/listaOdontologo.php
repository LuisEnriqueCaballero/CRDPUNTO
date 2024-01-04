<div class="modal fade" id="registroOdontologo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Odontologo CRD CLOUD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table id="example2" class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Numero Documento</th>
                        <th>Nombre Apellido</th>
                        <th>Clinica</th>
                        <th>COP</th>
                        <th>Telefono</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1="SELECT * FROM odontologo";
                    $query=mysqli_query($con,$sql1);
                   
                    while($ver=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $ver[21]?></td>
                            <td><?php echo $ver[2]." ".$ver[1]?></td>
                            <td><?php echo $ver[9]?></td>
                            <td><?php echo $ver[7]?></td>
                            <td><?php echo $ver[5]?></td>
                            <td>
                              <span id="elegir" class="btn btn-success" onclick="elegir(<?php echo $ver[0]?>)"><i class="fa fa-share" aria-hidden="true"></i></span>
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
        $('#example2').DataTable();
    });
</script>

