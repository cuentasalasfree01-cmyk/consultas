@extends('layouts.app')
@section('title', 'Clientes')

@section('content')
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0 text-primary"><i class="bi bi-people"></i> Clientes</h3>
            <a href="{{ route('clients.create') }}" class="btn btn-success">
                <i class="bi bi-person-plus"></i> Nuevo cliente
            </a>
        </div>
        <!-- Ejemplo de tabla de clientes -->
        <div class="card p-3 border-0 shadow-sm" style="border-radius: 14px;">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>ID</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->surname }}</td>
                                <td>{{ $client->id_number }}</td>
                                <td>
                                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- Más acciones si lo necesitas -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
