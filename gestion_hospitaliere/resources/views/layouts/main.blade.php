<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Hospitalière</title>
    <!-- Lien vers le fichier CSS de Bootstrap -->
    <link href="{{ asset('build/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Lien vers le fichier CSS de Bootstrap -->
        <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Script Bootstrap JS -->
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
    <!-- Navbar ou autre contenu global -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark mr-5 px-5">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Gestion Hospitalière</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav"> --}}
                {{-- <li class="nav-item active">
                    <a class="nav-link" href="{{ route('patients.index') }}">Patients</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav> --}}

    <!-- Contenu de la page -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Script Bootstrap JS -->
    <script src="{{ asset('build/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
