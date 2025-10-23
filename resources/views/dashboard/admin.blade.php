@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 bg-primary text-white py-4 rounded shadow-sm" style="min-height:450px;">
                <div class="text-center mb-4">
                    <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                    <h5 class="mt-2">{{ Auth::user()->name }}</h5>
                    <small>{{ Auth::user()->email }}</small>
                </div>
                <div class="list-group">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">
                        <i class="bi bi-grid"></i> Dashboard
                    </a>
                    <a href="{{ route('clients.index') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-people"></i> Ver clientes
                    </a>
                    <a href="{{ route('clients.create') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-plus"></i> Nuevo cliente
                    </a>
                    <a href="{{ route('procedures.index') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-folder2-open"></i> Trámites
                    </a>
                    <a href="{{ route('custom-fields.index') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-ui-checks"></i> Campos personalizados
                    </a>
                    <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-lines-fill"></i> Mi perfil
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button class="btn btn-outline-danger btn-block w-100">
                            <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
            <!-- Contenido principal -->
            <div class="col-md-9 py-4">
                <h2 class="mb-4">Panel de administración</h2>
                <div class="row g-3">
                    <!-- Tarjeta rápida de clientes -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Clientes registrados</h5>
                                <p class="display-4">{{ $clientsCount ?? 0 }}</p>
                                <a href="{{ route('clients.index') }}" class="btn btn-light btn-sm">Ver clientes</a>
                                <a href="{{ route('clients.create') }}" class="btn btn-success btn-sm">Nuevo cliente</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta rápida de trámites -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Trámites</h5>
                                <a href="{{ route('procedures.index') }}" class="btn btn-light">Gestionar trámites</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta rápida de campos personalizados -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Campos personalizados</h5>
                                <a href="{{ route('custom-fields.index') }}" class="btn btn-light">Ver/editar campos</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta de perfil -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-secondary mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Tu perfil</h5>
                                <a href="{{ route('profile.edit') }}" class="btn btn-light">Editar perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Aquí puedes agregar widgets, reportes o gráficos si lo requieres -->
            </div>
        </div>
    </div>
@endsection
