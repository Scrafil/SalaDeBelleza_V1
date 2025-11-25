@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="card gilded p-4 shadow-sm">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
            <div>
                <h2 class="mb-1">{{ $persona->name }} {{ $persona->last_name }}</h2>
                <p class="text-muted small mb-0">Detalles de la persona</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('personas.edit', $persona) }}" class="btn btn-outline-gold btn-sm btn-action">
                    <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    <span>Editar</span>
                </a>
                <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary btn-sm btn-action">
                    <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    <span>Volver</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-3 field-label">Información Personal</h5>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-semibold" width="40%">Tipo Documento:</td>
                                <td>{{ $persona->document_type ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">N° Documento:</td>
                                <td>{{ $persona->document_number ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Email:</td>
                                <td>{{ $persona->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Celular:</td>
                                <td>{{ $persona->cellphone ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Edad:</td>
                                <td>{{ $persona->age ?? '-' }} años</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="mb-3 field-label">Información Adicional</h5>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-semibold" width="40%">Fecha Nacimiento:</td>
                                <td>{{ optional($persona->birth_date)->format('d/m/Y') ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Dirección:</td>
                                <td>{{ $persona->address ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
