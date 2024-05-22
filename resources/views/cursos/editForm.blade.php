<div class="modal fade" id="vehiculoEditModal" tabindex="-1" role="dialog" aria-labelledby="vehiculoEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehiculoEditModalLabel">Editar Vehículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="vehiculoEditForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editPlaca">Placa</label>
                        <input type="text" name="placa" class="form-control" id="editPlaca" required>
                    </div>
                    <div class="form-group">
                        <label for="editModelo">Modelo</label>
                        <input type="text" name="modelo" class="form-control" id="editModelo" required>
                    </div>
                    <div class="form-group">
                        <label for="editPropietario">Propietario</label>
                        <input type="text" name="propietario" class="form-control" id="editPropietario" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="editSubmitBtn">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
