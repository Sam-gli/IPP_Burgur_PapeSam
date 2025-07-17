@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    .custom-card {
        background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
        border: 2px solid #ffd700;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(255, 215, 0, 0.1);
        backdrop-filter: blur(10px);
    }

    .custom-title {
        background: linear-gradient(135deg, #ffd700, #ffed4a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
        font-weight: 800;
    }

    .custom-input {
        background: linear-gradient(145deg, #2d2d2d, #1a1a1a);
        border: 2px solid #333;
        border-radius: 15px;
        color: #ffd700;
        transition: all 0.3s ease;
    }

    .custom-input:focus {
        border-color: #ffd700;
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
        color: #ffd700;
    }

    .custom-input::placeholder {
        color: #666;
    }

    .custom-label {
        color: #ffd700;
        font-weight: 600;
        text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
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
        color: #000;
    }

    .custom-btn:active {
        transform: translateY(0);
    }

    .custom-file-input {
        background: linear-gradient(145deg, #2d2d2d, #1a1a1a);
        border: 2px dashed #ffd700;
        border-radius: 15px;
        color: #ffd700;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .custom-file-input:hover {
        border-color: #ffed4a;
        background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
    }

    .burger-icon {
        font-size: 2rem;
        color: #ffd700;
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
    }

    .form-floating .form-control {
        background: linear-gradient(145deg, #2d2d2d, #1a1a1a);
        border: 2px solid #333;
        border-radius: 15px;
        color: #ffd700;
    }

    .form-floating .form-control:focus {
        border-color: #ffd700;
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
        color: #ffd700;
    }

    .form-floating label {
        color: #ffd700;
        font-weight: 600;
    }

    .error-message {
        color: #ff6b6b;
        background: rgba(255, 107, 107, 0.1);
        border: 1px solid #ff6b6b;
        border-radius: 8px;
        padding: 8px 12px;
        margin-top: 5px;
        font-size: 0.875rem;
    }

    .success-message {
        color: #51cf66;
        background: rgba(81, 207, 102, 0.1);
        border: 1px solid #51cf66;
        border-radius: 8px;
        padding: 8px 12px;
        margin-top: 5px;
        font-size: 0.875rem;
    }
</style>

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="custom-card p-5">
                <!-- Header avec icône -->
                <div class="text-center mb-4">
                    <div class="burger-icon mb-3">🍔</div>
                    <h2 class="custom-title mb-0">Ajouter un Nouveau Burger</h2>
                    <p class="text-muted mt-2">Créez votre burger parfait</p>
                </div>

                <!-- Messages d'erreur globaux -->
                @if($errors->any())
                    <div class="alert alert-danger bg-dark border-danger text-danger mb-4">
                        <h6 class="alert-heading">Erreurs de validation :</h6>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger bg-dark border-danger text-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success bg-dark border-success text-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Formulaire -->
                <form action="{{ route('burgers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nom du burger -->
                    <div class="form-floating mb-4">
                        <input type="text"
                               name="nom"
                               id="nom"
                               class="form-control custom-input @error('nom') is-invalid @enderror"
                               placeholder="Nom du burger"
                               value="{{ old('nom') }}"
                               required>
                        <label for="nom" class="custom-label">
                            <i class="fas fa-hamburger me-2"></i>Nom du Burger
                        </label>
                        @error('nom')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Prix -->
                    <div class="form-floating mb-4">
                        <input type="number"
                               name="prix"
                               id="prix"
                               step="0.01"
                               min="0"
                               class="form-control custom-input @error('prix') is-invalid @enderror"
                               placeholder="Prix"
                               value="{{ old('prix') }}"
                               required>
                        <label for="prix" class="custom-label">
                            <i class="fas fa-coins me-2"></i>Prix (FCFA)
                        </label>
                        @error('prix')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-floating mb-4">
                        <textarea name="description"
                                  id="description"
                                  class="form-control custom-input @error('description') is-invalid @enderror"
                                  placeholder="Description"
                                  style="height: 100px"
                                  required>{{ old('description') }}</textarea>
                        <label for="description" class="custom-label">
                            <i class="fas fa-align-left me-2"></i>Description
                        </label>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Catégorie -->
                    <div class="form-floating mb-4">
                        <input type="text"
                               name="categorie"
                               id="categorie"
                               class="form-control custom-input @error('categorie') is-invalid @enderror"
                               placeholder="Catégorie"
                               value="{{ old('categorie', 'Autre') }}"
                               required>
                        <label for="categorie" class="custom-label">
                            <i class="fas fa-tags me-2"></i>Catégorie
                        </label>
                        @error('categorie')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="form-floating mb-4">
                        <input type="number"
                               name="stock"
                               id="stock"
                               min="0"
                               class="form-control custom-input @error('stock') is-invalid @enderror"
                               placeholder="Stock"
                               value="{{ old('stock') }}"
                               required>
                        <label for="stock" class="custom-label">
                            <i class="fas fa-box me-2"></i>Stock Disponible
                        </label>
                        @error('stock')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label for="image" class="custom-label mb-3">
                            <i class="fas fa-image me-2"></i>Image du Burger
                        </label>
                        <div class="custom-file-input">
                            <input type="file"
                                   name="image"
                                   id="image"
                                   class="form-control-file d-none"
                                   accept="image/*"
                                   required>
                            <div class="file-upload-content" onclick="document.getElementById('image').click()">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-2 text-warning"></i>
                                <p class="mb-0">Cliquez pour sélectionner une image</p>
                                <small class="text-muted">Formats acceptés: JPG, PNG, GIF (max 2MB)</small>
                            </div>
                        </div>
                        @error('image')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Boutons d'action -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn custom-btn w-100 py-3">
                                <i class="fas fa-save me-2"></i>Enregistrer le Burger
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Prévisualisation de l'image
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const uploadContent = document.querySelector('.file-upload-content');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                uploadContent.innerHTML = `
                    <img src="${e.target.result}" style="max-width: 100%; max-height: 200px; border-radius: 10px;">
                    <p class="mt-2 mb-0 text-warning">${file.name}</p>
                    <small class="text-muted">Cliquez pour changer</small>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Animation au focus des inputs
    document.querySelectorAll('.custom-input').forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
        });

        input.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
        });
    });
</script>

@endsection
