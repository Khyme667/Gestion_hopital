@extends('layouts.main')

@section('content')
    <h1>Liste des Stocks</h1>

    <a href="{{ route('stocks.create') }}" class="btn btn-success mb-3">Nouvel Article</a>
    <a href="{{ route('fournisseurs.index') }}" class="btn btn-success mb-3">Fournisseurs</a>

    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Quantité</th>
                <th>Seuil Min</th>
                <th>Fournisseur</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr class="{{ $stock->estStockFaible() ? 'table-danger' : '' }}">
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->nom }}</td>
                    <td>{{ $stock->type }}</td>
                    <td>{{ $stock->quantite }}</td>
                    <td>{{ $stock->seuil_min }}</td>
                    <td>{{ $stock->fournisseur->nom ?? 'Non spécifié' }}</td>
                    <td>
                        {{ $stock->estStockFaible() ? 'Stock faible' : 'OK' }}
                    </td>
                    <td>
                        <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection