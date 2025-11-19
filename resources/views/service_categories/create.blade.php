@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nueva Categoría</h2>
    <a href="{{ route('service-categories.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    <form action="{{ route('service-categories.store') }}" method="POST">
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

        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Categoría:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Ej: Manicure" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Categoría</button>
    </form>
</div>
@endsection