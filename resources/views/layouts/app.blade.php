<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            @yield('title', config('app.name', 'Biblioteca Digital'))
        </title>
        @vite('resources/css/app.css')
        <!-- Solución rápida: CDN de Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
        @stack('styles')
    </head>
    <body class="bg-gray-50">
        @yield('content')
        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
