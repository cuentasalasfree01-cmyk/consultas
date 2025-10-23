@extends('layouts.app')

@section('content')
    <h1>Crear Procedimiento</h1>
    <form action="{{ route('procedures.store') }}" method="POST">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Descripción</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Guardar</button>
    </form>
@endsection
