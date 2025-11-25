@extends('layouts.app')

@section('content')
<div class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h1 class="display-5 fw-bold">Bienvenida al Software de SalónDebelleza</h1>
      <p class="lead text-muted">Panel administrativo — gestiona Personas, Usuarios, Servicios, Citas, Transacciones y más desde aquí.</p>
    </div>

    <div class="row g-4">
      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('personas.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 13c3.866 0 7-3.134 7-7S16.866-1 13-1 6 2.134 6 6s3.134 7 7 7zM2 24c0-6.627 5.373-12 12-12s12 5.373 12 12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Personas</h5>
                <small class="card-subtitle">Clientes / contactos</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('users.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 21v-2a4 4 0 014-4h4a4 4 0 014 4v2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Usuarios</h5>
                <small class="card-subtitle">Administradores y personal</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('services.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Servicios</h5>
                <small class="card-subtitle">Catálogo y precio</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('service-categories.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 7h18M7 21V7" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Categorías</h5>
                <small class="card-subtitle">Organiza servicios</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('appointments.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M3 10h18M7 4h10v6H7z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Citas</h5>
                <small class="card-subtitle">Reservas y agenda</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('transactions.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M3 6h18v12H3zM7 6v12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Transacciones</h5>
                <small class="text-muted">Historial de ventas</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('expenses.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M3 7h18M6 7v13h12V7" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Gastos</h5>
                <small class="card-subtitle">Control de desembolsos</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('roles.index') }}" class="text-decoration-none">
          <div class="card p-3 shadow-sm gilded h-100 card-hover">
            <div class="d-flex align-items-center gap-3">
              <div class="rounded-circle p-3 icon-bg" style="width:56px;height:56px;display:grid;place-items:center;">
                <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M12 2v6M12 12v6M6 6h12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <div>
                <h5 class="mb-0 card-title">Roles</h5>
                <small class="card-subtitle">Permisos y perfiles</small>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

  </div>
</div>
@endsection