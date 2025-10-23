@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('components.sidebar-client')
        </div>
        <div class="col-md-9 py-4">
            <h2>Bienvenido, {{ Auth::user()->name }}</h2>
            <div class="alert alert-success">
                Aquí puedes ver tus datos personales y el estado de tus trámites.
            </div>
            <h4>Mis Datos</h4>
            <ul>
                <li>Nombre: {{ Auth::user()->name }}</li>
                <li>Email: {{ Auth::user()->email }}</li>
            </ul>
            <h4 class="mt-4">Mis Trámites</h4>
            @if (isset($procedures) && $procedures->count())
                <ul>
                    @foreach ($procedures as $procedure)
                        <li>
                            {{ $procedure->name }} ({{ $procedure->pivot->status }} - {{ $procedure->pivot->percentage }}%)
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No tienes trámites asignados aún.</p>
            @endif
        </div>
    </div>
@endsection
