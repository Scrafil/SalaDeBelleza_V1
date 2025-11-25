@extends('layouts.app')

@section('content')
<div class="card gilded p-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="mb-0">Crear Persona</h3>
        <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary">Volver</a>
    </div>

    <form method="POST" action="{{ route('personas.store') }}">
        @include('personas._form')

        <div class="mt-3">
            <button class="btn btn-gold">Guardar persona</button>
            <a class="btn btn-light" href="{{ route('personas.index') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection
