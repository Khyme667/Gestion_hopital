@extends('layouts.main')

@section('content')
    <h1>Liste des Rendez-vous</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('rendez-vous.create') }}" class="btn btn-success mb-3">Nouveau Rendez-vous</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Date</th>
                <th>Raison</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rendezVous as $rdv)
                <tr class="{{ $rdv->status === 'annule' ? 'table-danger' : ($rdv->status === 'confirme' ? 'table-success' : 'table-warning') }}">
                    <td>{{ $rdv->id }}</td>
                    <td>{{ $rdv->patient->name }}</td>
                    <td>{{ $rdv->date_rendez_vous }}</td>
                    <td>{{ $rdv->raison }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $rdv->status)) }}</td>
                    <td>
                        @if($rdv->status === 'en_attente')
                            <form action="{{ route('rendez-vous.confirm', $rdv->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <select name="employee_id" class="form-control d-inline w-auto" required>
                                    <option value="">-- Choisir un médecin --</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success">Confirmer</button>
                            </form>
                            <form action="{{ route('rendez-vous.cancel', $rdv->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Annuler ce rendez-vous ?')">Annuler</button>
                            </form>
                        @endif
                        @if($rdv->consultation)
                            <a href="{{ route('consultations.edit', $rdv->consultation->id) }}" class="btn btn-info">Voir Consultation</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection