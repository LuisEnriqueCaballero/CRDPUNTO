<div class="modal fade" id="equipoactualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="FormulariU">   
            <input type="text" hidden name="idequipo" id="idequipo" >    
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="">Marca</label>
                    <input type="text" name="marcaU" id="marcaU" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Seleciona el nombre de la marca">
                </div>
                <div class="form-group col-md-5">
                    <label for="">Modelo</label>
                    <input type="text" name="modeloU" id="modeloU" class="form-control" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese el nombre del modelo de equipo">
                </div>
                <div class="form-group col-md-2">
                    <label for="">cantidad</label>
                    <input type="number" name="cantidadU" id="cantidadU" class="form-control" min="1" placeholder="0">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="">Precio</label>
                  <input type="text" name="precioU" id="precioU" autocomplete="off" class="form-control" oninput="calculaAct()" placeholder="Ingrese precio">
                </div>
                <div class="form-group col-md-4">
                  <label for="">Punto Generado</label>
                  <input type="text" name="puntogU" id="puntogU" autocomplete="off" class="form-control" placeholder="" step="0.001" disabled readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="">Punto Canjeo</label>
                  <input type="text" name="puntocU" id="puntocU" autocomplete="off" class="form-control" placeholder="Ingrese lo punto canjeo">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Descripcion</label>
                    <textarea name="descripcionU" id="descripcionU" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" class="form-control"></textarea>
                </div>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="actualizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>