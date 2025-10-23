@extends('layouts.app')
@section('title', 'Eliminar Cliente')

@section('content')
    <a href="{{ route('clients.index') }}" class="btn btn-outline-primary mb-4">
        <i class="bi bi-arrow-left"></i> Volver a clientes
    </a>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 18px;">
                    <div class="card-body text-center">
                        <h3 class="text-danger mb-4">
                            <i class="bi bi-exclamation-triangle"></i> Confirmar eliminación
                        </h3>
                        <p class="lead">
                            ¿Seguro que deseas eliminar al cliente <strong>{{ $client->name }}
                                {{ $client->surname }}</strong>
                            con ID <strong>{{ $client->id_number }}</strong>?<br>
                            <span class="fw-semibold">Esta acción no se puede deshacer.</span>
                        </p>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-2">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
