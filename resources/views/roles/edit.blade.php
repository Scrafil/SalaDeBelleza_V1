@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Rol: {{ $role->name }}</h2>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    {{-- Formulario que enviará datos al método update del controlador --}}
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Se usa el método PUT para actualizar recursos --}}

        {{-- Mostrar errores de validación si existen --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Rol:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $role->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Rol</button>
    </form>
</div>
@endsection