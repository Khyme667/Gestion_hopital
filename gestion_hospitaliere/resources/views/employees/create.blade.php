@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Ajouter un employé</h2>

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

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-control" id="role" name="role" required>
                <option value="">Sélectionnez un rôle</option>
                <option value="Médecin" {{ old('role') == 'Médecin' ? 'selected' : '' }}>Médecin</option>
                <option value="Infirmier" {{ old('role') == 'Infirmier' ? 'selected' : '' }}>Infirmier</option>
                <option value="Administrateur" {{ old('role') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
