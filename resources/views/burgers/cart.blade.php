@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12 bg-gradient-to-br from-black to-gray-900 rounded-xl shadow-2xl min-h-screen">
    <h1 class="text-4xl font-bold mb-10 text-yellow-400 text-center tracking-tight uppercase">🛒 Votre Panier</h1>

    @if($cartItems->isEmpty())
        <p class="text-yellow-300 text-center text-xl font-medium animate-pulse">Votre panier est vide. Ajoutez des burgers ! 🍔</p>
    @else
        <div class="space-y-8">
            @foreach($cartItems as $item)
                <div class="flex items-center p-6 bg-gray-950 rounded-xl shadow-lg hover:shadow-yellow-600 transition-all duration-300 border border-yellow-700">
                    <img src="{{ $item->burger->image }}" alt="{{ $item->burger->name }}" class="w-28 h-28 object-cover rounded-lg border-2 border-yellow-500 shadow-md">
                    <div class="flex-1 ml-6">
                        <h2 class="text-2xl font-bold text-yellow-400">{{ $item->burger->name }}</h2>
                        <p class="text-yellow-300 text-lg">Prix unitaire : <span class="font-semibold">{{ $item->burger->prix }} FCFA</span></p>
                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center space-x-4 mt-4">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantite" value="{{ $item->quantite }}" min="1" max="{{ $item->burger->stock }}"
                                class="w-20 p-2 rounded-lg bg-black text-yellow-300 border-2 border-yellow-500 focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-center">
                            <button type="submit"
                                class="px-5 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-600 transition-all shadow-md">🔄 Mettre à jour</button>
                            <a href="{{ route('cart.remove', $item) }}"
                                class="px-5 py-2 bg-red-600 text-white font-bold rounded hover:bg-red-700 transition-all shadow-md">❌ Supprimer</a>
                        </form>
                    </div>
                    <p class="text-xl font-bold text-yellow-400 ml-8">{{ $item->burger->prix * $item->quantite }} FCFA</p>
                </div>
            @endforeach

            <div class="text-right mt-10">
                <p class="text-3xl font-extrabold text-yellow-300">Total : {{ $total }} FCFA</p>
                <a href="{{ route('cart.checkout') }}"
                   class="mt-6 inline-block px-8 py-4 bg-green-500 text-black rounded-lg hover:bg-green-600 transition-all text-lg font-semibold shadow-lg">✅ Passer la commande</a>
            </div>
        </div>
    @endif
</div>
@endsection
