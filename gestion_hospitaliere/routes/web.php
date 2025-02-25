<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Inclure les routes d'authentification de Breeze
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::middleware('admin')->group(function () {
//     Route::resource('patients', PatientController::class);
// });

Route::get('/activity-logs', [ActivityLogController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('activity-logs.index');

Route::get('/consultations/{consultation}/download/{type}', [ConsultationController::class, 'download']) // Ajout de la route
    ->middleware('auth')
    ->name('consultations.download');

Route::resource('patients', PatientController::class);
Route::resource('consultations', ConsultationController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('stocks', StockController::class);
Route::resource('fournisseurs', FournisseurController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('rendez-vous', RendezVousController::class);
    Route::post('/rendez-vous/{rendezVous}/confirm', [RendezVousController::class, 'confirm'])->name('rendez-vous.confirm');
    Route::post('/rendez-vous/{id}/update', [RendezVousController::class, 'update'])->name('rendez-vous.update');
    Route::post('/rendez-vous/{rendezVous}/cancel', [RendezVousController::class, 'cancel'])->name('rendez-vous.cancel');
});