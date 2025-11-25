@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="card gilded p-4 shadow-sm">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
            <div>
                <h2 class="mb-1">Personas</h2>
                <p class="text-muted small mb-0">Gestión de clientes y contactos</p>
            </div>
            <a href="{{ route('personas.create') }}" class="btn btn-gold btn-action">
                <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                <span>Nueva Persona</span>
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th class="text-nowrap">Nombre</th>
                        <th class="text-nowrap d-none d-lg-table-cell">Email / Celular</th>
                        <th class="text-nowrap d-none d-md-table-cell">Documento</th>
                        <th class="text-nowrap d-none d-sm-table-cell">Edad</th>
                        <th class="text-nowrap" width="180px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($personas as $persona)
                    <tr>
                        <td><span class="badge badge-gold">{{ $persona->id }}</span></td>
                        <td class="fw-semibold">{{ $persona->name }} {{ $persona->last_name }}</td>
                        <td class="d-none d-lg-table-cell">
                            <div class="small">{{ $persona->email ?? '-' }}</div>
                            <div class="small text-muted">{{ $persona->cellphone ?? '-' }}</div>
                        </td>
                        <td class="d-none d-md-table-cell">{{ $persona->document_number ?? '-' }}</td>
                        <td class="d-none d-sm-table-cell">{{ $persona->age ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-1 flex-wrap">
                                <a class="btn btn-outline-secondary btn-sm btn-action" href="{{ route('personas.show', $persona) }}" title="Ver">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <span>Ver</span>
                                </a>
                                <a class="btn btn-outline-gold btn-sm btn-action" href="{{ route('personas.edit', $persona) }}" title="Editar">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    <span>Editar</span>
                                </a>
                                <form action="{{ route('personas.destroy', $persona) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-action" onclick="return confirm('¿Eliminar esta persona?')" title="Eliminar">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                        <span>Eliminar</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <svg class="mx-auto mb-2" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm6 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM7 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/></svg>
                                <div>No hay personas registradas.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{!! $personas->links() !!}</div>
    </div>
</div>
@endsection
