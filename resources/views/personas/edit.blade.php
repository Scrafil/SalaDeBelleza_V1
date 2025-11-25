@extends('layouts.app')

@section('content')
<div class="card gilded p-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">Editar Persona — {{ $persona->name }} {{ $persona->last_name }}</h3>
        <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary">Volver</a>
    </div>

    <form method="POST" action="{{ route('personas.update', $persona) }}">
        @method('PUT')
        @include('personas._form')

        <div class="mt-3">
            <button class="btn btn-gold">Actualizar</button>
            <a class="btn btn-light" href="{{ route('personas.index') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection
