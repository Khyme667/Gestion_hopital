@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 text-center py-5">Dashboard</h1>

        <!-- Première rangée de cartes -->
        <div class="row py-5">
            <!-- Card pour la gestion des patients -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-users fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Gestion des Patients</h5>
                        <a href="{{ route('patients.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card pour la gestion des consultations -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-stethoscope fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Consultations</h5>
                        <a href="{{ route('consultations.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card pour la gestion du personnel -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-user-md fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Personnel</h5>
                        <a href="{{ route('employees.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card pour la gestion des stocks -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-boxes fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Stocks</h5>
                        <a href="{{ route('stocks.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deuxième rangée de cartes -->
        <div class="row py-5">
            <!-- Card pour les rendez-vous -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-calendar-check fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Rendez-vous</h5>
                        <a href="{{ route('rendez-vous.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card pour les heures -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-clock fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Heures des Employés</h5>
                        <a href="{{ route('schedules.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card pour les fournisseurs -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-truck fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Fournisseurs</h5>
                        <a href="{{ route('fournisseurs.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card pour les logs -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body text-center p-6">
                        <i class="fas fa-history fa-2x text-indigo-600 mb-3"></i>
                        <h5 class="card-title text-lg font-semibold text-gray-700">Activités des Utilisateurs</h5>
                        <a href="{{ route('activity-logs.index') }}" class="btn btn-primary mt-3">Accéder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles personnalisés -->
    <style>
        .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
            transform: translateY(-2px);
        }
        .card {
            border-radius: 1rem;
        }
    </style>

@endsection

@section('scripts')
    <!-- Font Awesome pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- JavaScript personnalisé -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.querySelector('i').classList.add('fa-bounce');
                });
                card.addEventListener('mouseleave', () => {
                    card.querySelector('i').classList.remove('fa-bounce');
                });
            });
        });
    </script>
@endsection