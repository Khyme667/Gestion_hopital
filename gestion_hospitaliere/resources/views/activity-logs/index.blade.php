@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1>Journal des Activités</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Action</th>
                <th>Modèle</th>
                <th>ID</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->user->name ?? 'Utilisateur supprimé' }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->model }}</td>
                    <td>{{ $log->model_id }}</td>
                    <td>{{ $log->description ?? 'N/A' }}</td>
                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $logs->links() }}
</div>
@endsection