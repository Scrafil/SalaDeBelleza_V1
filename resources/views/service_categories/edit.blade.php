@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Categoría: {{ $serviceCategory->name }}</h2>
    <a href="{{ route('service-categories.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    <form action="{{ route('service-categories.update', $serviceCategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    </foreach>
                </ul>
            </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Categoría:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $serviceCategory->name) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Categoría</button>
    </form>
</div>
@endsection