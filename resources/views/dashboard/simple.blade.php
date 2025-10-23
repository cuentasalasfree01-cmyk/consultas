@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="alert alert-success">
            <h2>¡Dashboard Funcionando! ✅</h2>
            <p>Bienvenido {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Dashboard</h5>
                        <p>Funcional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
