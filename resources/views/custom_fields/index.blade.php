@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Campos personalizados</h2>
        <a href="{{ route('custom-fields.create') }}" class="btn btn-primary mb-3">Nuevo campo</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                    <th>Obligatorio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customFields as $field)
                    <tr>
                        <td>{{ $field->id }}</td>
                        <td>{{ $field->name }}</td>
                        <td>{{ $field->type }}</td>
                        <td>
                            @if ($field->type == 'select')
                                @php
                                    $options = json_decode($field->options ?? '[]', true);
                                    if (!is_array($options)) {
                                        $options = [];
                                    }
                                @endphp
                                {{ implode(', ', $options) }}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $field->required ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('custom-fields.edit', $field->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('custom-fields.destroy', $field->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro de eliminar este campo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No hay campos personalizados registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
