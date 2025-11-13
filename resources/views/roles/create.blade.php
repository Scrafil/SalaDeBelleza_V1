@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Rol</h2>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    {{-- Formulario que enviará datos al método store del controlador --}}
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

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
            <input type="text" name="name" id="name" class="form-control" placeholder="Ej: Manager" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Descripción breve del rol.">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar Rol</button>
    </form>
</div>
@endsection