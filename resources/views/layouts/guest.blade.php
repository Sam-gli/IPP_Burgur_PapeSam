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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
                min-height: 100vh;
                font-family: 'Poppins', sans-serif;
                color: #ffd700;
            }

            .auth-card {
                background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
                border: 2px solid #ffd700;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(255, 215, 0, 0.1);
                backdrop-filter: blur(10px);
            }

            .auth-title {
                background: linear-gradient(135deg, #ffd700, #ffed4a);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
                font-weight: 800;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-yellow-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 auth-card overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
