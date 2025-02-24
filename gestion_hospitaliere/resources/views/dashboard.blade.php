@extends('layouts.main')

@section('content')
    <h1>Dashboard</h1>

    <div class="row">
        <!-- Card pour la gestion des patients -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Gestion des Patients</h5>
                    <a href="{{ route('patients.index') }}" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>

        <!-- Card pour la gestion des consultations -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Consultations</h5>
                    <a href="{{ route('consultations.index') }}" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>

        <!-- Card pour la gestion du personnel -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Personnel</h5>
                    <a href="{{ route('employees.index') }}" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>

        <!-- Card pour la gestion des stocks -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Stocks</h5>
                    <a href="#" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
    </div>
@endsection
