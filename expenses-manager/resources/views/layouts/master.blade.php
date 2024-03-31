@if (session('user')) 
    {{-- @dump(session('user')) --}}
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" > --}}
        <link href="{{ asset('/bootstrap.min.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            body {
                overflow-x: hidden;
            }
        </style>
    </head>


    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    @if (session('user') && session('user')->isAdmin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('manageUsers') }}">Manage users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bucket') }}">Manage Bucket</a>
                        </li>
                    @endif
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main style="flex-grow: 1;">
            @yield('content')
        </main>

        <footer style="display: flex; justify-content: flex-start;">
            <p style="margin-left: 2em; margin-right: 1em;"> Aric Or (A01337169) </p>
            <p> Julie Oh (A01335411) </p>
        </footer>
    </body>

    </html>    
    @else
    <script type="text/javascript">
        window.location = "{{ route('login') }}";
    </script>
@endif
