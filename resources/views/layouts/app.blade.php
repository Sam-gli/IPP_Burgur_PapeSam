<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Style Global -->
    <style>
        body {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            color: #ffc107;
            font-family: 'Poppins', sans-serif;
        }

        a {
            color: #ffc107;
            text-decoration: none;
        }

        a:hover {
            color: #ffca2c;
            text-decoration: underline;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: #000;
            font-weight: 600;
        }

        .btn-warning:hover {
            background-color: #ffca2c;
            color: #000;
        }

        .card {
            background-color: #1e1e1e;
            border: 1px solid #ffc107;
            color: #ffc107;
            border-radius: 12px;
            padding: 20px;
        }

        .navbar {
            background-color: #111;
            border-bottom: 1px solid #ffc107;
        }

        .navbar a {
            color: #ffc107;
            margin-right: 15px;
        }

        .navbar a:hover {
            color: #ffca2c;
        }

        h1, h2, h3, h4, h5 {
            color: #ffc107;
        }

        footer {
            background-color: #111;
            color: #ffc107;
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #ffc107;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="py-5 container">
            @if (isset($slot))
                {{ $slot }}
            @endif

            @yield('content')
        </main>
    </div>

    <footer>
        &copy; {{ date('Y') }} - {{ config('app.name', 'Laravel') }}. Tous droits réservés.
    </footer>
</body>
</html>
