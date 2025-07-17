<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IPP_Burger</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
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

        .welcome-btn {
            background: linear-gradient(135deg, #ffd700, #ffed4a);
            border: none;
            border-radius: 15px;
            color: #000;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.3);
            padding: 12px 24px;
        }

        .welcome-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(255, 215, 0, 0.4);
            background: linear-gradient(135deg, #ffed4a, #ffd700);
        }

        .welcome-title {
            background: linear-gradient(135deg, #ffd700, #ffed4a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
            font-weight: 800;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
    @if (Route::has('login'))
        <livewire:welcome.navigation/>
    @endif

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200">
                <!-- Fond cercle -->
                <circle cx="100" cy="100" r="95" fill="#1a1a1a" stroke="#ffd700" stroke-width="5"/>
                <!-- Partie supérieure du burger -->
                <rect x="50" y="80" width="100" height="20" rx="10" fill="#ffd700"/>
                <!-- Salade -->
                <rect x="55" y="100" width="90" height="10" rx="5" fill="#32CD32"/>
                <!-- Partie inférieure du burger -->
                <rect x="50" y="110" width="100" height="20" rx="10" fill="#ffd700"/>
                <!-- Texte IPP Burger -->
                <text x="100" y="170" font-family="Poppins" font-size="20" fill="#ffd700"
                      text-anchor="middle" font-weight="bold">
                    IPP Burger
                </text>
            </svg>
        </div>

        <div class="text-center mt-10">
            <h1 class="welcome-title text-4xl font-semibold mb-4">Bienvenue à IPP Burger!!!</h1>
            <p class="mt-4 text-lg text-yellow-300">Découvrez nos délicieux burgers et passez vos commandes en toute simplicité.</p>
            <a href="{{ route('catalogue') }}" class="welcome-btn inline-block mt-6">
                Voir le Menu
            </a>
        </div>
    </div>
</div>
</body>
</html>
