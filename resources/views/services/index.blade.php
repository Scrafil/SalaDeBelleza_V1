@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gestión de Servicios
        <a href="{{ route('services.create') }}" class="btn btn-primary float-end">Crear Nuevo Servicio</a>
    </h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Duración (min)</th>
                <th>Disponible</th>
                <th width="200px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                {{-- Accede al nombre de la categoría a través de la relación 'category' --}}
                <td>{{ $service->category->name ?? 'Sin Categoría' }}</td> 
                <td>{{ $service->name }}</td>
                <td>${{ number_format($service->base_price, 2) }}</td>
                <td>{{ $service->duration_minutes }}</td>
                <td>
                    <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $service->is_active ? 'Sí' : 'No' }}
                    </span>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('services.edit', $service->id) }}">Editar</a>

                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este servicio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {!! $services->links() !!}
</div>
@endsection