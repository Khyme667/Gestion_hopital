@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1>Liste des Fournisseurs</h1>

    <a href="{{ route('fournisseurs.create') }}" class="btn btn-success mb-3">Nouveau Fournisseur</a>

    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Contact</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->id }}</td>
                    <td>{{ $fournisseur->nom }}</td>
                    <td>{{ $fournisseur->contact ?? 'Non spécifié' }}</td>
                    <td>{{ $fournisseur->adresse ?? 'Non spécifiée' }}</td>
                    <td>
                        <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection