<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    {{-- Enlace a Bootstrap (si no lo estás compilando con Vite) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            {{-- Aquí se insertará el contenido de index.blade.php --}}
            @yield('content')
        </main>
    </div>
</body>
</html>