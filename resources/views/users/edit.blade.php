@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="card gilded p-4 shadow-sm">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
            <div>
                <h2 class="mb-1">Editar Usuario</h2>
                <p class="text-muted small mb-0">Actualiza la información del usuario {{ $user->name }}</p>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-action">
                <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                <span>Volver</span>
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Rol --}}
                <div class="col-md-6 mb-3">
                    <label for="role_id" class="form-label field-label">Rol:</label>
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
                <label for="name" class="form-label field-label">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Apellido --}}
            <div class="col-md-6 mb-3">
                <label for="last_name" class="form-label field-label">Apellido:</label>
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $user->last_name) }}" required>
            </div>

            {{-- Tipo de Documento --}}
            <div class="col-md-3 mb-3">
                <label for="document_type" class="form-label field-label">Tipo Doc:</label>
                <select name="document_type" id="document_type" class="form-select @error('document_type') is-invalid @enderror" required>
                    <option value="CC" {{ old('document_type', $user->document_type) == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                    <option value="TI" {{ old('document_type', $user->document_type) == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                    <option value="PP" {{ old('document_type', $user->document_type) == 'PP' ? 'selected' : '' }}>Pasaporte</option>
                    <option value="CE" {{ old('document_type', $user->document_type) == 'CE' ? 'selected' : '' }}>Cédula Extranjera</option>
                </select>
            </div>

            {{-- Número de Documento --}}
            <div class="col-md-3 mb-3">
                <label for="document_number" class="form-label field-label">N° Documento:</label>
                <input type="text" name="document_number" id="document_number" class="form-control @error('document_number') is-invalid @enderror" value="{{ old('document_number', $user->document_number) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Teléfono --}}
            <div class="col-md-6 mb-3">
                <label for="phone_number" class="form-label field-label">Teléfono:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $user->phone_number) }}">
            </div>

            {{-- Email --}}
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label field-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Contraseña (Opcional en edición) --}}
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label field-label">Contraseña (Dejar vacío para no cambiar):</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            </div>

            {{-- Confirmar Contraseña (Opcional en edición) --}}
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label field-label">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-gold mt-3">Actualizar Usuario</button>
        </form>
    </div>
</div>
@endsection