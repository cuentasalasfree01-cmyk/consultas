@extends('layouts.app')
@section('title', 'Registrar Persona')

@section('content')
    <a href="{{ route('clients.index') }}" class="btn btn-outline-primary mb-4">
        <i class="bi bi-arrow-left"></i> Volver a clientes
    </a>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 18px;">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-primary">
                            <i class="bi bi-person-plus"></i> Registrar persona
                        </h3>
                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombres *</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Apellidos *</label>
                                <input type="text" name="surname" id="surname" class="form-control" required
                                    value="{{ old('surname') }}">
                            </div>
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Fecha de nacimiento *</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control" required
                                    value="{{ old('birthdate') }}">
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">País *</label>
                                <input type="text" name="country" id="country" class="form-control" required
                                    value="{{ old('country', 'Colombia') }}">
                            </div>
                            <div class="mb-3">
                                <label for="id_type" class="form-label">Tipo de identificación *</label>
                                <select name="id_type" id="id_type" class="form-select" required>
                                    <option value="">Seleccione</option>
                                    <option value="CC" {{ old('id_type') == 'CC' ? 'selected' : '' }}>Cédula de
                                        ciudadanía</option>
                                    <option value="CE" {{ old('id_type') == 'CE' ? 'selected' : '' }}>Cédula de
                                        extranjería</option>
                                    <option value="TI" {{ old('id_type') == 'TI' ? 'selected' : '' }}>Tarjeta de
                                        identidad</option>
                                    <option value="PA" {{ old('id_type') == 'PA' ? 'selected' : '' }}>Pasaporte</option>
                                    <option value="NIT" {{ old('id_type') == 'NIT' ? 'selected' : '' }}>NIT</option>
                                    <option value="Otro" {{ old('id_type') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_number" class="form-label">Número de identificación *</label>
                                <input type="text" name="id_number" id="id_number" class="form-control" required
                                    value="{{ old('id_number') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-person-check"></i> Guardar
                                </button>
                                <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
