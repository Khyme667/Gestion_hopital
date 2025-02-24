@extends('layouts.main')

@section('content')
{{-- <a href="{{ route('consultations.create', $patient) }}" class="btn btn-success mb-3">Ajouter</a> --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Historique des Consultations de {{ $patient->name }}</h4>
                </div>
                <div class="card-body">
                    @if ($patient->consultations->isEmpty())
                        <p>Aucune consultation n'a été trouvée pour ce patient.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Raison</th>
                                    <th>Ordonnances</th>
                                    <th>Prescriptions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patient->consultations as $consultation)
                                <tr>
                                    <td>{{ $consultation->date }}</td>
                                    <td>{{ $consultation->raison }}</td>
                                    <td>
                                        @if ($consultation->ordonnances)
                                            <a href="{{ asset('storage/' . $consultation->ordonnances) }}" class="btn btn-primary btn-sm" download>Télécharger l'ordonnance</a>
                                        @else
                                            <p>Aucune ordonnance disponible</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($consultation->prescriptions)
                                            <a href="{{ asset('storage/' . $consultation->prescriptions) }}" class="btn btn-primary btn-sm" download>Télécharger la prescription</a>
                                        @else
                                            <p>Aucune prescription disponible</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
