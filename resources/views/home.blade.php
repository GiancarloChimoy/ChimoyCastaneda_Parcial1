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
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#vehiculoModal" onclick="openCreateModal()">Registrar Vehículo</button>

                    <!-- Tabla de vehículos -->
                    <div class="table-responsive">
                        <table class="table table-striped" id="vehiculosTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Placa</th>
                                    <th>Modelo</th>
                                    <th>Propietario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehiculos as $vehiculo)
                                    <tr>
                                        <td>{{ $vehiculo->id }}</td>
                                        <td>{{ $vehiculo->placa }}</td>
                                        <td>{{ $vehiculo->modelo }}</td>
                                        <td>{{ $vehiculo->propietario }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#vehiculoEditModal" onclick="openEditModal({{ $vehiculo->toJson() }})">Editar</button>
                                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este vehículo?');">
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

<!-- Incluir el modal de registro -->
@include('cursos.form')

<!-- Incluir el modal de edición -->
@include('cursos.editForm')

@endsection

@section('scripts')
<script>
function openCreateModal() {
    $('#vehiculoModalLabel').text('Registrar Nuevo Vehículo');
    $('#vehiculoForm').attr('action', '{{ route('vehiculos.store') }}');
    $('#vehiculoForm').trigger('reset');
    $('#vehiculoModal').modal('show');
}

// Función para abrir el modal de edición y llenar los campos
function openEditModal(vehiculo) {
    $('#vehiculoEditModalLabel').text('Editar Vehículo');
    $('#vehiculoEditForm').attr('action', '/vehiculos/' + vehiculo.id);
    $('#editPlaca').val(vehiculo.placa);
    $('#editModelo').val(vehiculo.modelo);
    $('#editPropietario').val(vehiculo.propietario);
    $('#editSubmitBtn').text('Actualizar');
    $('#vehiculoEditModal').modal('show');
}

$(document).ready(function() {
    // Al hacer submit en el formulario de registro, cerrar el modal
    $('#vehiculoForm').on('submit', function() {
        $('#vehiculoModal').modal('hide');
    });

    // Al hacer submit en el formulario de edición, cerrar el modal
    $('#vehiculoEditForm').on('submit', function() {
        $('#vehiculoEditModal').modal('hide');
    });
});
</script>
@endsection



