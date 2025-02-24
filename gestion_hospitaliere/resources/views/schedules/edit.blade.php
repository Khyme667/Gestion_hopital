@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Modifier l'horaire</h2>

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

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="employee_id" class="form-label">Employé</label>
            <select class="form-control" id="employee_id" name="employee_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $schedule->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label">Jour</label>
            <input type="text" class="form-control" id="day" name="day" value="{{ old('day', $schedule->day) }}" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Heure de début</label>
            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $schedule->start_time) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Heure de fin</label>
            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $schedule->end_time) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
