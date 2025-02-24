@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Liste des horaires</h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Ajouter un horaire</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employé</th>
                <th>Jour</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->employee->name }}</td>
                    <td>{{ $schedule->day }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun horaire trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
