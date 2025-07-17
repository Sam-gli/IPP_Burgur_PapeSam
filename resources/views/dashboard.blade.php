@extends('layouts.app')

@section('content')
a   `q1<style>
    .custom-card {
        background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
        border: 2px solid #ffd700;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(255, 215, 0, 0.1);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(255, 215, 0, 0.2);
    }

    .custom-title {
        background: linear-gradient(135deg, #ffd700, #ffed4a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
        font-weight: 800;
    }

    .custom-btn {
        background: linear-gradient(135deg, #ffd700, #ffed4a);
        border: none;
        border-radius: 15px;
        color: #000;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(255, 215, 0, 0.3);
    }

    .custom-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(255, 215, 0, 0.4);
        background: linear-gradient(135deg, #ffed4a, #ffd700);
    }
</style>

@if (auth()->check() && auth()->user()->isClient())
<div class="container mx-auto px-4 py-12 min-h-screen" style="background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);">
    <!-- Titre -->
    <h1 class="custom-title text-4xl font-extrabold mb-8 text-center tracking-tight">
        Bienvenue, {{ auth()->user()->name }} 👋
    </h1>

    <!-- Grille des cartes -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Carte : Dernières Commandes -->
        <div class="custom-card p-6">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 text-yellow-400 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Dernières Commandes
                </h2>
                <a href="{{ route('cart.show') }}" class="text-yellow-400 hover:text-yellow-300 hover:underline font-medium">
                    Voir toutes les commandes
                </a>
            </div>
        </div>

        <!-- Carte : Actions Rapides -->
        <div class="custom-card p-6">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 text-yellow-400 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Actions Rapides
                </h2>
                <a href="{{ route('home') }}" class="custom-btn inline-block px-6 py-3">
                    Commander un Burger
                </a>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->check() && auth()->user()->isGestionnaire())
<div class="container mx-auto px-4 py-12 min-h-screen" style="background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);">
    <!-- Titre -->
    <h1 class="custom-title text-4xl font-extrabold mb-8 text-center tracking-tight">
        Bienvenue, {{ auth()->user()->name }} 👋
    </h1>

    <!-- Grille des cartes -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Carte : Dernières Commandes du Jour -->
        <div class="custom-card p-6">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 text-yellow-400 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Dernières Commandes du Jour
                </h2>
                <a href="{{ route('commandes.index') }}" class="text-yellow-400 hover:text-yellow-300 hover:underline font-medium">
                    Voir toutes les commandes des clients
                </a>
            </div>
        </div>

        <!-- Carte : Actions Rapides -->
        <div class="custom-card p-6">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 text-yellow-400 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Actions Rapides
                </h2>
                <a href="{{ route('commandes.index') }}" class="custom-btn inline-block px-6 py-3">
                    Liste des Commandes
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
