@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Editar campo personalizado</h2>
        <form action="{{ route('custom-fields.update', $customField->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del campo</label>
                <input type="text" name="name" id="name" class="form-control" required
                    value="{{ old('name', $customField->name) }}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo de campo</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="text" {{ $customField->type == 'text' ? 'selected' : '' }}>Texto</option>
                    <option value="number" {{ $customField->type == 'number' ? 'selected' : '' }}>Número</option>
                    <option value="date" {{ $customField->type == 'date' ? 'selected' : '' }}>Fecha</option>
                    <option value="select" {{ $customField->type == 'select' ? 'selected' : '' }}>Lista desplegable</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="options" class="form-label">Opciones (solo para listas desplegables)</label>
                <input type="text" name="options" id="options" class="form-control"
                    value="{{ old('options', implode(',', json_decode($customField->options ?? '[]', true))) }}">
                <small class="form-text text-muted">Ejemplo: Turista,Trabajo,Estudio</small>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="required" id="required" class="form-check-input" value="1"
                    {{ $customField->required ? 'checked' : '' }}>
                <label for="required" class="form-check-label">Este campo es obligatorio</label>
            </div>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a href="{{ route('custom-fields.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
@endsection
