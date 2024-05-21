@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Barra de búsqueda -->
                    <form action="{{ route('home') }}" method="GET" class="mb-3" id="searchForm">
                        <div class="input-group">
                            <input type="text" name="search" id="searchInput" class="form-control" placeholder="Buscar por ID o Nombre" value="{{ $search }}">
                            <button type="submit" class="btn btn-primary" id="searchBtn">Buscar</button>
                        </div>
                    </form>

                    <!-- Mensaje de búsqueda -->
                    @if ($mensaje)
                        <div class="alert alert-warning" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif

                    <!-- Botón para abrir el modal de registro -->
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#cursoModal" onclick="openCreateModal()">Registrar Curso</button>

                    <!-- Tabla de cursos -->
                    <div class="table-responsive">
                        <table class="table table-striped" id="coursesTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Nombre del Curso</th>
                                    <th>Créditos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                    <tr>
                                        <td>{{ $curso->id }}</td>
                                        <td>{{ $curso->codigo }}</td>
                                        <td>{{ $curso->nombre }}</td>
                                        <td>{{ $curso->numero_creditos }}</td>
                                        <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#cursoModal" onclick="openEditModal({{ $curso->toJson() }})">Editar</button>
                                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este curso?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluir el modal de formulario -->
@include('cursos.form')

@endsection

@section('scripts')
<script>
function openCreateModal() {
    $('#modalTitle').text('Registrar Curso');
    $('#cursoForm').attr('action', '{{ route('cursos.store') }}');
    $('#cursoForm').trigger('reset');
    $('#curso_id').val('');
    $('#method').val('POST');
    $('#cursoModalLabel').text('Registrar Curso');
    $('#submitBtn').text('Registrar');
}

function openEditModal(curso) {
    curso = JSON.parse(curso); // Convertir el objeto JSON a un objeto JavaScript
    $('#modalTitle').text('Editar Curso');
    $('#cursoForm').attr('action', '/cursos/' + curso.id); // Corregir la ruta de acción para la edición
    $('#curso_id').val(curso.id); // Cargar el ID del curso a editar
    $('#method').val('PUT');
    $('#nombre').val(curso.nombre);
    $('#codigo').val(curso.codigo);
    $('#numero_creditos').val(curso.numero_creditos);
    $('#cursoModalLabel').text('Editar Curso');
    $('#submitBtn').text('Editar'); // Cambiar el texto del botón a "Editar"
    $('#cursoModal').modal('show'); // Mostrar el modal de edición
}

$(document).ready(function() {
    // Mostrar el modal de registro al cargar la página
    openCreateModal();

    // Al hacer submit en el formulario, cerrar el modal
    $('#cursoForm').on('submit', function() {
        $('#cursoModal').modal('hide');
    });
});
</script>
@endsection



