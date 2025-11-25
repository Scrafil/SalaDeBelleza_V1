@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="card gilded p-4 shadow-sm">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
            <div>
                <h2 class="mb-1">Editar Rol</h2>
                <p class="text-muted small mb-0">Actualiza la información del rol {{ $role->name }}</p>
            </div>
            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary btn-action">
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

        {{-- Formulario que enviará datos al método update del controlador --}}
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Se usa el método PUT para actualizar recursos --}}

            <div class="mb-3">
                <label for="name" class="form-label field-label">Nombre del Rol:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label field-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $role->description) }}</textarea>
        </div>

            <button type="submit" class="btn btn-gold">Actualizar Rol</button>
        </form>
    </div>
</div>
@endsection