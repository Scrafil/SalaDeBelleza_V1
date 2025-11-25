@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="card gilded p-4 shadow-sm">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
            <div>
                <h2 class="mb-1">Editar Servicio</h2>
                <p class="text-muted small mb-0">Actualiza la información del servicio {{ $service->name }}</p>
            </div>
            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-action">
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

        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Categoría --}}
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label field-label">Categoría:</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Seleccione una Categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nombre del Servicio --}}
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label field-label">Nombre del Servicio:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $service->name) }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Precio --}}
            <div class="col-md-4 mb-3">
                <label for="base_price" class="form-label field-label">Precio ($):</label>
                <input type="number" step="0.01" name="base_price" id="base_price" class="form-control" value="{{ old('base_price', $service->base_price) }}" required>
            </div>

            {{-- Duración --}}
            <div class="col-md-4 mb-3">
                <label for="duration_minutes" class="form-label field-label">Duración (minutos):</label>
                <input type="number" name="duration_minutes" id="duration_minutes" class="form-control" value="{{ old('duration_minutes', $service->duration_minutes) }}" required>
            </div>

            {{-- Disponible --}}
<div class="form-check form-switch pb-2">
    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active) == true ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Servicio Disponible</label>
</div>
        </div>

        {{-- Descripción --}}
        <div class="mb-3">
            <label for="description" class="form-label field-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $service->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-gold">Actualizar Servicio</button>
        </form>
    </div>
</div>
@endsection