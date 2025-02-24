@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter un Patient</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Date de Naissance</label>
                            <input type="date" name="birth_date" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="text" name="phone" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Adresse</label>
                            <input type="text" name="address" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="medical_history">Historique Médical</label>
                            <textarea name="medical_history" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
