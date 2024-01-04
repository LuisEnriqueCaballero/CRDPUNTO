
<!-- Modal -->
<div class="modal fade" id="radiologicoActualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actluzar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formularioU">
            <input type="text" id="idradiologia" name="idradiologia" hidden>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Tipo de Examen Radiografico</label>
                    <input type="text" name="radiograficoA" id="radiograficoA" placeholder="Ingrese nombre de tipo Examen" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Costo del Examen</label>
                    <input type="text" name="precioU" id="precioU" class="form-control" oninput="calculoRadiografiaA()">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">punto generado</label>
                    <input type="text" name="puntogU" id="puntogU" class="form-control" step="0.001" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="">punto canjeo</label>
                    <input type="text" name="puntocA" id="puntocA" class="form-control" >
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="actualizar">actualizar</button>
      </div>
    </div>
  </div>
</div>