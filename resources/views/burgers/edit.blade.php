@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-8 bg-[#1a1a1a] text-yellow-400 border border-yellow-600 rounded-2xl shadow-lg mt-12">
    <h2 class="text-3xl font-bold mb-6 text-center text-yellow-500 border-b border-yellow-600 pb-2">
        Modifier le Burger 🍔
    </h2>

    <form action="{{ route('burgers.update', $burger) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <div>
            <label for="name" class="block text-sm font-semibold mb-1">Nom du burger</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="w-full p-3 bg-black border border-yellow-600 rounded-lg text-yellow-300 placeholder-yellow-600 focus:ring-2 focus:ring-yellow-400"
                   value="{{ $burger->nom }}"
                   required>
        </div>

        <!-- Prix -->
        <div>
            <label for="price" class="block text-sm font-semibold mb-1">Prix (FCFA)</label>
            <input type="number"
                   name="price"
                   id="price"
                   step="0.01"
                   min="0"
                   class="w-full p-3 bg-black border border-yellow-600 rounded-lg text-yellow-300 placeholder-yellow-600 focus:ring-2 focus:ring-yellow-400"
                   value="{{ $burger->prix }}"
                   required>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-semibold mb-1">Description</label>
            <textarea name="description"
                      id="description"
                      rows="4"
                      class="w-full p-3 bg-black border border-yellow-600 rounded-lg text-yellow-300 placeholder-yellow-600 focus:ring-2 focus:ring-yellow-400"
                      required>{{ $burger->description }}</textarea>
        </div>

        <!-- Catégorie -->
        <div>
            <label for="categorie" class="block text-sm font-semibold mb-1">Catégorie</label>
            <input type="text"
                   name="categorie"
                   id="categorie"
                   class="w-full p-3 bg-black border border-yellow-600 rounded-lg text-yellow-300 placeholder-yellow-600 focus:ring-2 focus:ring-yellow-400"
                   value="{{ $burger->categorie }}"
                   required>
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="block text-sm font-semibold mb-1">Stock disponible</label>
            <input type="number"
                   name="stock"
                   id="stock"
                   min="0"
                   class="w-full p-3 bg-black border border-yellow-600 rounded-lg text-yellow-300 placeholder-yellow-600 focus:ring-2 focus:ring-yellow-400"
                   value="{{ $burger->stock }}"
                   required>
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-semibold mb-1">Nouvelle image (optionnel)</label>
            <input type="file"
                   name="image"
                   id="image"
                   class="block w-full text-yellow-300 bg-black border border-yellow-600 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-black hover:file:bg-yellow-600 transition-all">
        </div>

        <!-- Bouton de validation -->
        <button type="submit"
                class="w-full py-3 bg-yellow-500 text-black rounded-lg font-semibold hover:bg-yellow-600 transform hover:-translate-y-1 transition duration-300 shadow-md">
            Mettre à jour
        </button>
    </form>
</div>
@endsection
