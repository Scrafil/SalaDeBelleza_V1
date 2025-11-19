@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Usuarios
        <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Crear Nuevo Usuario</a>
    </h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Documento</th>
                <th width="200px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->role->name ?? 'N/A' }}</td>
                <td>{{ $user->name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->document_number }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Editar</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{-- Paginación --}}
    {!! $users->links() !!}
</div>
@endsection