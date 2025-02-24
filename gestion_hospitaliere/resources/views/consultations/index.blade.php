@extends('layouts.main')

@section('content')
    <h1>Liste des Consultations</h1>

    <a href="{{ route('consultations.create') }}" class="btn btn-success mb-3">Nouvelle Consultation</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Date</th>
                <th>Raison</th>
                <th>Médecin</th>
                <th>Prescriptions</th>
                <th>Ordonnances</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->patient->name }}</td>
                    <td>{{ $consultation->date }}</td>
                    <td>{{ $consultation->raison }}</td>
                    <td>{{ $consultation->employee->name ?? 'Non attribué' }}</td>
                    <td>
                        @if($consultation->ordonnances)
                            <a href="{{ asset('storage/' . $consultation->ordonnances) }}" target="_blank">Télécharger</a>
                        @endif
                    </td>
                    <td>
                        @if($consultation->prescriptions)
                            <a href="{{ asset('storage/' . $consultation->prescriptions) }}" target="_blank">Télécharger</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('patients.show', $consultation->patient_id) }}" class="btn btn-info">Historique</a>
                        <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
