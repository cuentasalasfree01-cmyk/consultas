@extends('layouts.app')
@section('title', 'Detalle de Persona')

@section('content')
    <a href="{{ route('clients.index') }}" class="btn btn-outline-primary mb-4">
        <i class="bi bi-arrow-left"></i> Volver a clientes
    </a>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 18px;">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-primary">
                            <i class="bi bi-person"></i> Detalle de persona
                        </h3>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item"><strong>Nombres:</strong> {{ $client->name }}</li>
                            <li class="list-group-item"><strong>Apellidos:</strong> {{ $client->surname }}</li>
                            <li class="list-group-item"><strong>Fecha de nacimiento:</strong> {{ $client->birthdate }}</li>
                            <li class="list-group-item"><strong>País:</strong> {{ $client->country }}</li>
                            <li class="list-group-item"><strong>Tipo de ID:</strong> {{ $client->id_type }}</li>
                            <li class="list-group-item"><strong>Número de ID:</strong> {{ $client->id_number }}</li>
                            <li class="list-group-item"><strong>Correo electrónico:</strong> {{ $client->email }}</li>
                            <li class="list-group-item"><strong>Teléfono:</strong> {{ $client->phone }}</li>
                        </ul>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
