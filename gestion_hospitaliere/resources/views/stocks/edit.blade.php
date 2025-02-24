@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Modifier l'article : {{ $stock->nom }}</h2>

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

    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $stock->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="médicament" {{ $stock->type == 'médicament' ? 'selected' : '' }}>Médicament</option>
                <option value="équipement" {{ $stock->type == 'équipement' ? 'selected' : '' }}>Équipement</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ old('quantite', $stock->quantite) }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="seuil_min" class="form-label">Seuil minimum</label>
            <input type="number"隊class="form-control" id="seuil_min" name="seuil_min" value="{{ old('seuil_min', $stock->seuil_min) }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="fournisseur_id" class="form-label">Fournisseur</label>
            <select class="form-control" id="fournisseur_id" name="fournisseur_id">
                <option value="">Aucun</option>
                @foreach ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id }}" {{ $stock->fournisseur_id == $fournisseur->id ? 'selected' : '' }}>
                        {{ $fournisseur->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('stocks.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection