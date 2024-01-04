
<!-- Modal -->
<div class="modal fade" id="implanteactualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Nuevo Implante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formularioU">       
            <div class="form-row">
                <input type="text" hidden name="idimplante" id="idimplante">
                <div class="form-group col-md-5">
                    <label for="">Marca</label>
                    <input type="text" name="marcaA" id="marcaA" class="form-control" placeholder="Seleciona el nombre de la marca" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-5">
                    <label for="">Modelo</label>
                    <input type="text" name="modeloA" id="modeloA" class="form-control" placeholder="Ingrese el nombre del modelo de implante" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-2">
                    <label for="">cantidad</label>
                    <input type="number" name="cantidadU" id="cantidadU" class="form-control" min="1" placeholder="0" autocomplete="off">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Precio</label>
                  <input type="text" name="precioU" id="precioU" class="form-control" oninput="calculaAct()" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                  <label for="">Punto Generado</label>
                  <input type="text" name="puntogU" id="puntogU" class="form-control" step="0.001"  autocomplete="off" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="">Punto Canjeo</label>
                  <input type="text" name="puntocU" id="puntocU" class="form-control"  autocomplete="off">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Descripcion</label>
                    <textarea name="descripcionU" id="descripcionU" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();"></textarea>
                </div>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="actualizar">Actulizar</button>
      </div>
    </div>
  </div>
</div>