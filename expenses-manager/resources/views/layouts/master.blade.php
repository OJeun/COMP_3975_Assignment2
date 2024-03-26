<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body>
    @if(session('user') && session('user')->isAdmin)
        <nav>
            <a href="{{ route('manageUsers') }}">Manage User</a>
            {{-- <a href="{{ route('managebucket') }}">Manage Bucket</a> --}}
        </nav>
    @endif

    <header>
        <p> Aric Or (A01337169) </p>
        <p> Julie Oh (A01335411) </p>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p> Aric Or (A01337169) </p>
        <p> Julie Oh (A01335411) </p>
    </footer>
</body>
</html>
