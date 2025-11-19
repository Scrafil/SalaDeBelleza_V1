@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Servicio</h2>
    <a href="{{ route('services.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf

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
            {{-- Categoría --}}
            <div class="col-md-6 mb-3">
                <label for="category_id" class="form-label">Categoría:</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Seleccione una Categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nombre del Servicio --}}
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nombre del Servicio:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
        </div>

        <div class="row">
            {{-- Precio --}}
            <div class="col-md-4 mb-3">
                <label for="base_price" class="form-label">Precio ($):</label>
                <input type="number" step="0.01" name="base_price" id="base_price" class="form-control" value="{{ old('base_price') }}" required>
            </div>

            {{-- Duración --}}
            <div class="col-md-4 mb-3">
                <label for="duration_minutes" class="form-label">Duración (minutos):</label>
                <input type="number" name="duration_minutes" id="duration_minutes" class="form-control" value="{{ old('duration_minutes') }}" required>
            </div>

            {{-- Disponible --}}
            <div class="col-md-4 mb-3 d-flex align-items-end">
                <div class="form-check form-switch pb-2">
    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked {{ old('is_active') == true ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Servicio Disponible</label>
</div>
            </div>
        </div>

        {{-- Descripción --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar Servicio</button>
    </form>
</div>
@endsection