<div class="modal fade" id="cursoModal" tabindex="-1" role="dialog" aria-labelledby="cursoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="cursoModalLabel">
    <span id="modalTitle"></span>
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cursoForm" method="POST" action="{{ route('cursos.store') }}">
                    @csrf
                    <input type="hidden" name="curso_id" id="curso_id" value="{{ isset($curso) ? $curso->id : '' }}">
                    <div class="form-group">
                        <label for="nombre">Nombre del Curso</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ isset($curso) ? $curso->nombre : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" value="{{ isset($curso) ? $curso->codigo : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="numero_creditos">Número de Créditos</label>
                        <input type="number" name="numero_creditos" class="form-control" id="numero_creditos" value="{{ isset($curso) ? $curso->numero_creditos : '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn">{{ isset($curso) ? 'Editar' : 'Registrar' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

