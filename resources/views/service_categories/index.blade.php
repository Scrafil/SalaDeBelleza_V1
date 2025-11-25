@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="card gilded p-4 shadow-sm">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
            <div>
                <h2 class="mb-1">Categorías de Servicios</h2>
                <p class="text-muted small mb-0">Organización de servicios por categoría</p>
            </div>
            <a href="{{ route('service-categories.create') }}" class="btn btn-gold btn-action">
                <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                <span>Nueva Categoría</span>
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
                        <th class="text-nowrap">Nombre de Categoría</th>
                        <th class="text-nowrap" width="180px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td><span class="badge badge-gold">{{ $category->id }}</span></td>
                        <td class="fw-semibold">{{ $category->name }}</td>
                        <td>
                            <div class="d-flex gap-1 flex-wrap">
                                <a class="btn btn-outline-gold btn-sm btn-action" href="{{ route('service-categories.edit', $category->id) }}" title="Editar">
                                    <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    <span>Editar</span>
                                </a>
                                <form action="{{ route('service-categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-action" onclick="return confirm('¿Está seguro de eliminar esta categoría?')" title="Eliminar">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                        <span>Eliminar</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                <svg class="mx-auto mb-2" width="48" height="48" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M3 7h18M7 21V7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <div>No hay categorías registradas.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{!! $categories->links() !!}</div>
    </div>
</div>
@endsection