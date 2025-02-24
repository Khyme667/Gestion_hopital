@extends('layouts.main')

@section('content')
    <h1>Liste des Patients</h1>

    <a href="{{ route('patients.create') }}" class="btn btn-success mb-3">Ajouter un Patient</a>
    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Date de naissance</th>
                <th>Phone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->birth_date }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->address }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">Historique</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
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
