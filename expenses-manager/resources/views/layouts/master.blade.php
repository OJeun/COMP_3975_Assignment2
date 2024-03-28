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


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                @if(session('user') && session('user')->isAdmin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manageUsers') }}">Manage users</a>
                        <a class="nav-link" href="{{ route('bucket') }}">Manage Bucket</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('managebucket') }}">Manage buckets</a> --}}
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('logout') }}">Logout</a> --}}
                </li>
            </ul>
        </div>
    </nav>



    <main>
        @yield('content')
    </main>

    <footer>
        <p> Aric Or (A01337169) </p>
        <p> Julie Oh (A01335411) </p>
    </footer>
</body>
</html>
