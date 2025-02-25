@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2>Modifier le rendez-vous</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rendez-vous.update', $rendezVous->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select class="form-control" id="patient_id" name="patient_id" required>
                    <option value="">-- Sélectionner un patient --</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $rendezVous->patient_id == $patient->id ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date_rendez_vous" class="form-label">Date du rendez-vous</label>
                <input type="date" class="form-control" id="date_rendez_vous" name="date_rendez_vous" value="{{ $rendezVous->date_rendez_vous }}" required>
            </div>
            <div class="mb-3">
                <label for="raison" class="form-label">Raison</label>
                <input type="text" class="form-control" id="raison" name="raison" value="{{ $rendezVous->raison }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="en_attente" {{ $rendezVous->status === 'en_attente' ? 'selected' : '' }}>En attente</option>
                    <option value="confirme" {{ $rendezVous->status === 'confirme' ? 'selected' : '' }}>Confirmé</option>
                    <option value="annule" {{ $rendezVous->status === 'annule' ? 'selected' : '' }}>Annulé</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection