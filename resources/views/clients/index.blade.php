@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Clientes</h2>
        <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Nuevo cliente</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }} {{ $client->surname }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>
                            <a href="{{ route('clients.show', $client) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
