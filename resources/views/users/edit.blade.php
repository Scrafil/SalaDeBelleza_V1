@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Usuario: {{ $user->name }}</h2>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            {{-- Rol --}}
            <div class="col-md-6 mb-3">
                <label for="role_id" class="form-label">Rol:</label>
                <select name="role_id" id="role_id" class="form-select @error('role_id') is-invalid @enderror" required>
                    <option value="">Seleccione un Rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nombre --}}
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Apellido --}}
            <div class="col-md-6 mb-3">
                <label for="last_name" class="form-label">Apellido:</label>
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $user->last_name) }}" required>
            </div>

            {{-- Tipo de Documento --}}
            <div class="col-md-3 mb-3">
                <label for="document_type" class="form-label">Tipo Doc:</label>
                <select name="document_type" id="document_type" class="form-select @error('document_type') is-invalid @enderror" required>
                    <option value="CC" {{ old('document_type', $user->document_type) == 'CC' ? 'selected' : '' }}>Cédula</option>
                    <option value="TI" {{ old('document_type', $user->document_type) == 'TI' ? 'selected' : '' }}>Tarjeta Identidad</option>
                    <option value="CE" {{ old('document_type', $user->document_type) == 'CE' ? 'selected' : '' }}>Cédula Extranjería</option>
                </select>
            </div>

            {{-- Número de Documento --}}
            <div class="col-md-3 mb-3">
                <label for="document_number" class="form-label">N° Documento:</label>
                <input type="text" name="document_number" id="document_number" class="form-control @error('document_number') is-invalid @enderror" value="{{ old('document_number', $user->document_number) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Teléfono --}}
            <div class="col-md-6 mb-3">
                <label for="phone_number" class="form-label">Teléfono:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $user->phone_number) }}">
            </div>

            {{-- Email --}}
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Contraseña (Opcional en edición) --}}
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Contraseña (Dejar vacío para no cambiar):</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            </div>

            {{-- Confirmar Contraseña (Opcional en edición) --}}
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3">Actualizar Usuario</button>
    </form>
</div>
@endsection