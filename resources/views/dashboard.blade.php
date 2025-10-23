@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card text-white bg-primary h-100" style="border-radius:16px;">
                    <div class="card-body">
                        <h5 class="card-title">Clientes registrados</h5>
                        <h1 class="display-4">{{ \App\Models\Client::count() }}</h1>
                        <a href="{{ route('clients.index') }}" class="btn btn-light btn-sm">Ver clientes</a>
                        <a href="{{ route('clients.create') }}" class="btn btn-success btn-sm">Nuevo cliente</a>
                    </div>
                </div>
            </div>
            <!-- Puedes agregar más tarjetas/resúmenes aquí -->
        </div>
    </div>
@endsection
