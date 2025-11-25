<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    {{-- Enlace a Bootstrap (si no lo estás compilando con Vite) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tema y utilidades comunes (paleta solicitada) --}}
    <link rel="preconnect" href="https://fonts.cdnfonts.com">
    <link href="https://fonts.cdnfonts.com/css/harmonis" rel="stylesheet">

    <style>
        :root{
            --accent-1: #FF6F61;
            --accent-2: #FDB72A;
            --dark-1: #2E2E2E;
            --gold-soft: #FFE3A0;
            --muted: #CED2D2;
            
            /* Light mode */
            --bg-primary: #fff;
            --bg-secondary: #fffaf0;
            --text-primary: #2E2E2E;
            --text-secondary: rgba(46,46,46,0.8);
            --text-muted: #6c757d;
            --border-color: rgba(206,210,210,0.6);
            --navbar-bg: linear-gradient(90deg, rgba(253,183,42,0.06), rgba(255,230,160,0.03));
            --navbar-border: rgba(206,210,210,0.25);
            --card-bg: linear-gradient(180deg,#fff,#fffaf0);
            --shadow-color: rgba(46,46,46,0.06);
        }

        body.dark-mode {
            --bg-primary: #1a1a1a;
            --bg-secondary: #2a2520;
            --text-primary: #e8e6e3;
            --text-secondary: rgba(232,230,227,0.8);
            --text-muted: #9ca3af;
            --border-color: rgba(253,183,42,0.2);
            --navbar-bg: linear-gradient(90deg, rgba(42,37,32,0.8), rgba(26,26,26,0.9));
            --navbar-border: rgba(253,183,42,0.15);
            --card-bg: linear-gradient(180deg,#252525,#2a2520);
            --shadow-color: rgba(0,0,0,0.3);
        }

        body {
            background: linear-gradient(180deg, var(--bg-primary) 0%, var(--bg-secondary) 60%);
            color: var(--text-primary);
            font-family: 'Harmonis', Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .navbar-custom {
            background: var(--navbar-bg);
            border-bottom: 1px solid var(--navbar-border);
            box-shadow: 0 6px 18px var(--shadow-color);
        }

        .brand { 
            color: var(--text-primary); 
            font-weight:700; 
            letter-spacing:.4px; 
            font-family: 'Harmonis', sans-serif; 
        }

        .nav-link {
            color: var(--text-secondary);
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-link.active, .nav-link:hover { 
            color: var(--accent-2); 
            background: rgba(253,183,42,0.15); 
            border-radius:6px; 
        }

        .btn-gold { 
            background: linear-gradient(90deg,var(--accent-2), #ffcc66); 
            border: none; 
            color: #2e2e2e; 
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-gold:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(253,183,42,0.3);
        }

        .btn-outline-gold {
            border: 1px solid var(--accent-2);
            color: var(--accent-2);
            background: transparent;
            transition: all 0.2s ease;
        }

        .btn-outline-gold:hover {
            background: var(--accent-2);
            color: #2e2e2e;
        }

        .card.gilded { 
            border: 1px solid var(--border-color); 
            background: var(--card-bg); 
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card.gilded:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px var(--shadow-color);
        }

        .field-label { 
            font-weight: 600; 
            color: var(--text-primary); 
        }

        footer.site-footer { 
            background: linear-gradient(90deg, rgba(253,183,42,0.03), transparent); 
            padding:1rem 0; 
            margin-top:2.5rem; 
            color: var(--text-secondary); 
        }

        .dark-mode-toggle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid var(--border-color);
            background: var(--card-bg);
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .dark-mode-toggle:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px var(--shadow-color);
        }

        .table {
            color: var(--text-primary);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(253,183,42,0.08);
        }

        .form-control, .form-select {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        .form-control:focus, .form-select:focus {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            border-color: var(--accent-2);
            box-shadow: 0 0 0 0.2rem rgba(253,183,42,0.15);
        }

        body.dark-mode .form-control::placeholder {
            color: var(--text-muted);
        }

        .badge-gold {
            background: var(--accent-2);
            color: #2e2e2e;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        .btn-action svg {
            width: 16px;
            height: 16px;
        }

        @media (max-width: 768px) {
            .btn-action span {
                display: none;
            }
            .btn-action {
                padding: 0.5rem;
            }
        }

        /* Dashboard cards */
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px var(--shadow-color);
        }

        .icon-bg {
            background: rgba(253,183,42,0.1);
            transition: background 0.2s ease;
        }

        .card-hover:hover .icon-bg {
            background: rgba(253,183,42,0.2);
        }

        .card-title {
            color: var(--text-primary);
        }

        .card-subtitle {
            color: var(--text-muted);
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-custom py-3">
            <div class="container">
                <a class="navbar-brand brand fs-4 text-decoration-none" href="{{ url('/') }}">SalaDeBelleza</a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 align-items-center">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('service-categories.index') }}">Categorías</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('personas.index') }}">Personas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('appointments.index') }}">Citas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Transacciones</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Gastos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                    </ul>

                    <div class="d-flex align-items-center gap-2">
                        <button class="dark-mode-toggle" id="darkModeToggle" aria-label="Toggle dark mode">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sun-icon">
                                <circle cx="10" cy="10" r="4"></circle>
                                <path d="M10 1v2M10 17v2M3.22 3.22l1.42 1.42M15.36 15.36l1.42 1.42M1 10h2M17 10h2M3.22 16.78l1.42-1.42M15.36 4.64l1.42-1.42"></path>
                            </svg>
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="moon-icon" style="display:none;">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg>
                        </button>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary btn-sm me-2">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">@csrf <button class="btn btn-gold btn-sm">Cerrar sesión</button></form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-link btn-sm">Iniciar</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-gold btn-sm ms-2">Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="site-footer">
            <div class="container text-center">
                <small>© {{ date('Y') }} SalaDeBelleza — Diseñado con cariño ✨</small>
            </div>
        </footer>
</div>

    {{-- Place to push page-specific scripts --}}
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Dark Mode Toggle
        (function() {
            const toggle = document.getElementById('darkModeToggle');
            const sunIcon = toggle.querySelector('.sun-icon');
            const moonIcon = toggle.querySelector('.moon-icon');
            const body = document.body;
            
            // Check saved preference
            const savedMode = localStorage.getItem('darkMode');
            if (savedMode === 'enabled') {
                body.classList.add('dark-mode');
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'block';
            }
            
            toggle.addEventListener('click', function() {
                body.classList.toggle('dark-mode');
                const isDark = body.classList.contains('dark-mode');
                
                sunIcon.style.display = isDark ? 'none' : 'block';
                moonIcon.style.display = isDark ? 'block' : 'none';
                
                localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
            });
        })();
    </script>
</body>
</html>