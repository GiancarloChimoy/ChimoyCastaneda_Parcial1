<div class="modal fade" id="cursoModal" tabindex="-1" role="dialog" aria-labelledby="cursoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cursoModalLabel">
                    Registrar Nuevo Curso
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cursoForm" method="POST" action="{{ route('cursos.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del Curso</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" required>
                    </div>
                    <div class="form-group">
                        <label for="numero_creditos">Número de Créditos</label>
                        <input type="number" name="numero_creditos" class="form-control" id="numero_creditos" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

