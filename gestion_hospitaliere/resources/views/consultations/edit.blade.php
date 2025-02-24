@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2>Modifier la consultation de {{ $consultation->patient->name }}</h2>

        <form action="{{ route('consultations.update', $consultation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select class="form-control" id="patient_id" name="patient_id" required>
                    <option value="">Sélectionner un patient</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $consultation->patient_id == $patient->id ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="date" class="form-label">Date de la consultation</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $consultation->date }}" required>
            </div>

            <div class="mb-3">
                <label for="raison" class="form-label">Raison de la consultation</label>
                <input type="text" class="form-control" id="raison" name="raison" value="{{ $consultation->raison }}" required>
            </div>

            <div class="mb-3">
                <label for="ordonnances" class="form-label">Ordonnances</label>
                <input type="file" class="form-control" id="ordonnances" name="ordonnances" accept="application/pdf,image/*">
                @if($consultation->ordonnances)
                    <a href="{{ asset('storage/' . $consultation->ordonnances) }}" target="_blank">Voir l'ordonnance actuelle</a>
                @endif
            </div>

            <div class="mb-3">
                <label for="prescriptions" class="form-label">Prescriptions</label>
                <input type="file" class="form-control" id="prescriptions" name="prescriptions" accept="application/pdf,image/*">
                @if($consultation->prescriptions)
                    <a href="{{ asset('storage/' . $consultation->prescriptions) }}" target="_blank">Voir la prescription actuelle</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour la consultation</button>
        </form>
    </div>
@endsection
