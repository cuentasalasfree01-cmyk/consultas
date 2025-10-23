@extends('layouts.app')

@section('content')
    <h1>Editar Procedimiento</h1>
    <form action="{{ route('procedures.update', $procedure) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="{{ old('name', $procedure->name) }}" required>

        <label for="description">Descripción</label>
        <textarea name="description" id="description">{{ old('description', $procedure->description) }}</textarea>

        <button type="submit">Actualizar</button>
    </form>
@endsection
