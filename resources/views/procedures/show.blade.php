@extends('layouts.app')

@section('content')
    <h1>{{ $procedure->name }}</h1>
    <p>{{ $procedure->description }}</p>

    <h3>Clientes relacionados</h3>
    <ul>
        @foreach ($procedure->clients as $client)
            <li>{{ $client->name }} - Estado: {{ $client->pivot->status }} - Progreso: {{ $client->pivot->percentage }}%
            </li>
        @endforeach
    </ul>
@endsection
