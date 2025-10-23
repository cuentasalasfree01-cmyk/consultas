@extends('layouts.app')

@section('content')
    <h1>Procedimiento</h1>
    <a href="{{ route('procedures.create') }}">Crear nuevo Procedimiento</a>
    <ul>
        @foreach ($procedures as $procedure)
            <li>
                <a href="{{ route('procedures.show', $procedure) }}">{{ $procedure->name }}</a>
                <a href="{{ route('procedures.edit', $procedure) }}">Editar</a>
                <form action="{{ route('procedures.destroy', $procedure) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
