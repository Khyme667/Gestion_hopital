@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Ajouter un article au stock</h2>

    <!-- Affichage des erreurs de validation -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="">Sélectionnez un type</option>
                <option value="médicament" {{ old('type') == 'médicament' ? 'selected' : '' }}>Médicament</option>
                <option value="équipement" {{ old('type') == 'équipement' ? 'selected' : '' }}>Équipement</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ old('quantite') }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="seuil_min" class="form-label">Seuil minimum</label>
            <input type="number" class="form-control" id="seuil_min" name="seuil_min" value="{{ old('seuil_min') }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="fournisseur_id" class="form-label">Fournisseur</label>
            <select class="form-control" id="fournisseur_id" name="fournisseur_id">
                <option value="">Aucun</option>
                @foreach ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id }}" {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}>
                        {{ $fournisseur->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('stocks.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection