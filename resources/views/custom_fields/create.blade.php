@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Crear Cliente</h2>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <!-- Campos fijos de Cliente -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre completo</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required
                    value="{{ old('email') }}">
            </div>
            <!-- Puedes agregar otros campos fijos aquí -->

            <h4 class="mt-4">Campos personalizados</h4>
            @foreach ($customFields as $field)
                @if ($field->type == 'text')
                    <input type="text" name="custom_fields[{{ $field->id }}]" id="custom_field_{{ $field->id }}"
                        class="form-control" {{ $field->required ? 'required' : '' }}
                        value="{{ old('custom_fields.' . $field->id) }}">
                @elseif($field->type == 'number')
                    <input type="number" name="custom_fields[{{ $field->id }}]" id="custom_field_{{ $field->id }}"
                        class="form-control" {{ $field->required ? 'required' : '' }}
                        value="{{ old('custom_fields.' . $field->id) }}">
                @elseif($field->type == 'date')
                    <input type="date" name="custom_fields[{{ $field->id }}]" id="custom_field_{{ $field->id }}"
                        class="form-control" {{ $field->required ? 'required' : '' }}
                        value="{{ old('custom_fields.' . $field->id) }}">
                @elseif($field->type == 'select')
                    <select name="custom_fields[{{ $field->id }}]" id="custom_field_{{ $field->id }}"
                        class="form-control" {{ $field->required ? 'required' : '' }}>
                        <option value="">Seleccione</option>
                        @php
                            $options = json_decode($field->options ?? '[]', true);
                            if (!is_array($options)) {
                                $options = [];
                            }
                        @endphp
                        @foreach ($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                @endif
            @endforeach


            <button type="submit" class="btn btn-success">Guardar Cliente</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
