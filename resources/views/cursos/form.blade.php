<div class="modal fade" id="vehiculoModal" tabindex="-1" role="dialog" aria-labelledby="vehiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehiculoModalLabel">Registrar Nuevo Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="vehiculoForm" method="POST" action="{{ route('vehiculos.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="placa">Placa</label>
                        <input type="text" name="placa" class="form-control" id="placa" required>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" class="form-control" id="modelo" required>
                    </div>
                    <div class="form-group">
                        <label for="propietario">Propietario</label>
                        <input type="text" name="propietario" class="form-control" id="propietario" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

