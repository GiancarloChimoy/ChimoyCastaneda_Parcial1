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
                                            <!-- Agrega aquí las acciones como editar y eliminar -->
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

@endsection








