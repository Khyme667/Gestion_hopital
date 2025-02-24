@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2>Modifier les informations du patient</h2>

        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $patient->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $patient->birth_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $patient->address) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="medical_history" class="form-label">Historique médicale</label>
                <textarea class="form-control" id="medical_history" name="medical_history" rows="3">{{ old('medical_history', $patient->medical_history) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </form>
    </div>
@endsection
