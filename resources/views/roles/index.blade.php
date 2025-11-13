@extends('layouts.app') 

@section('content')
<div class="container">
    <h2>Listado de Roles
        <a href="{{ route('roles.create') }}" class="btn btn-primary float-end">Crear Nuevo Rol</a>
    </h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th width="280px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    {{-- Formulario para editar --}}
                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>

                    {{-- Formulario para eliminar --}}
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection