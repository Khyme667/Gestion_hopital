@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2>Ajouter un rendez-vous</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rendez-vous.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select class="form-control" id="patient_id" name="patient_id" required>
                    <option value="">-- Sélectionner un patient --</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date_rendez_vous" class="form-label">Date du rendez-vous</label>
                <input type="date" class="form-control" id="date_rendez_vous" name="date_rendez_vous" required>
            </div>
            <div class="mb-3">
                <label for="raison" class="form-label">Raison</label>
                <input type="text" class="form-control" id="raison" name="raison" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection