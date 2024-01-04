<div class="modal fade" id="listaexamen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <table id="example1" class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>examen</th>
                        <th>precio</th>
                        <th>seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1="SELECT * FROM radiografia";
                    $query=mysqli_query($con,$sql1);
                     $a=0;
                    while($ver=mysqli_fetch_array($query)){
                        $a++;
                        ?>
                        <tr>
                        <td><?php echo $a ?></td>
                        <td><?php echo $ver['tipo_examen'] ?></td>
                        <td><?php echo $ver['precio'] ?></td> 
                        <td>
                            <span id="elegir" class="btn btn-success" onclick="examen(<?php echo $ver[0]?>)"><i class="fa fa-share" aria-hidden="true"></i></span>
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
        $('#example1').DataTable();
    });
</script>

