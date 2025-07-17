@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12 min-h-screen">
        <!-- Titre principal -->
        <h1 class="text-4xl font-extrabold mb-8 text-center text-warning tracking-tight">
            Nos Burgers 🍔
        </h1>

        <!-- Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-800 border-l-4 border-green-500 text-green-200 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-800 border-l-4 border-red-500 text-red-200 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Filtres -->
        <div class="mb-8 flex flex-col sm:flex-row gap-4 items-center justify-between bg-[#1a1a1a] p-4 rounded-xl shadow-md border border-yellow-600">
            <form method="GET" class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" name="search" placeholder="Rechercher un burger..."
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-yellow-600 bg-black text-yellow-400 placeholder-yellow-500 focus:ring-2 focus:ring-yellow-500 focus:outline-none transition-all"
                        value="{{ request('search') }}">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-yellow-500"></i>
                </div>

                <select name="sort"
                    class="w-full sm:w-48 py-2 rounded-lg border border-yellow-600 bg-black text-yellow-400 focus:ring-2 focus:ring-yellow-500 transition-all">
                    <option value="">Trier par prix</option>
                    <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Prix croissant</option>
                    <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Prix décroissant</option>
                </select>

                <button type="submit"
                    class="px-6 py-2 bg-yellow-500 text-black rounded-lg font-semibold hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400 transition-all">
                    Filtrer
                </button>
            </form>

            <a href="{{ route('cart.show') }}"
                class="px-6 py-2 bg-yellow-700 text-white rounded-lg hover:bg-yellow-800 transition-all font-semibold">
                Voir le Panier
            </a>
        </div>

        <!-- Liste des burgers -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($burgers as $burger)
                <div class="bg-[#1e1e1e] rounded-xl shadow-lg border border-yellow-600 overflow-hidden group transition-transform duration-300">
                    <!-- Image -->
                    <div class="relative">
                        <img src="{{ asset($burger->image) }}" alt="{{ $burger->name }}"
                            class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">

                        @if($burger->stock <= 0)
                            <span class="absolute top-4 right-4 bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Rupture de Stock</span>
                        @elseif($burger->stock <= 5)
                            <span class="absolute top-4 right-4 bg-yellow-400 text-black text-xs font-semibold px-3 py-1 rounded-full">Stock Faible</span>
                        @endif
                    </div>

                    <!-- Contenu -->
                    <div class="p-6 text-yellow-400">
                        <h2 class="text-xl font-semibold mb-2">{{ $burger->name }}</h2>
                        <p class="text-yellow-300 text-sm mb-4 line-clamp-2">{{ $burger->description }}</p>
                        <p class="text-lg font-bold text-yellow-500 mb-4">{{ $burger->prix }} FCFA</p>

                        <!-- Actions -->
                        <div class="flex flex-col gap-3">
                            @if($burger->stock > 0)
                                <form action="{{ route('burgers.addToCart', $burger) }}" method="POST" class="flex items-center gap-3">
                                    @csrf
                                    <input type="number" name="quantite" value="1" min="1" max="{{ $burger->stock }}"
                                           class="w-20 py-2 px-3 rounded-lg border border-yellow-600 bg-black text-yellow-300 focus:ring-yellow-400 transition-all">
                                    <button type="submit"
                                            class="flex-1 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all">
                                        Ajouter au Panier
                                    </button>
                                </form>
                            @else
                                <span class="py-2 text-center block bg-red-600 text-white rounded-lg opacity-75 cursor-not-allowed">
                                    Rupture de Stock
                                </span>
                            @endif
                            <a href="{{ route('burgers.show', $burger->id) }}"
                               class="py-2 text-center block bg-yellow-700 text-white rounded-lg hover:bg-yellow-800 transition-all">
                                Voir Détails
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full p-6 bg-red-800 rounded-xl shadow-md text-center text-white">
                    <i class="fas fa-times-circle mr-2"></i> Aucun burger trouvé ! Veuillez réessayer.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center text-warning">
            {{ $burgers->links('pagination::tailwind') }}
        </div>
    </div>
@endsection

