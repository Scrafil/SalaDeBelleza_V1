@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gestión de Categorías de Servicios
        <a href="{{ route('service-categories.create') }}" class="btn btn-primary float-end">Crear Nueva Categoría</a>
    </h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th width="150px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('service-categories.edit', $category->id) }}">Editar</a>

                    <form action="{{ route('service-categories.destroy', $category->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {!! $categories->links() !!}
</div>
@endsection