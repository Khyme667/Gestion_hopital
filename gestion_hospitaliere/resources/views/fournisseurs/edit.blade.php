@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Modifier le fournisseur : {{ $fournisseur->nom }}</h2>

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

    <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $fournisseur->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $fournisseur->contact) }}">
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $fournisseur->adresse) }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection