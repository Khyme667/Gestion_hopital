<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FournisseurController;
use Illuminate\Support\Facades\Route;

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

// Routes pour la gestion des patients et consultations
Route::resource('patients', PatientController::class);
Route::resource('consultations', ConsultationController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('stocks', StockController::class);
Route::resource('fournisseurs', FournisseurController::class);


// Supprime ces routes qui sont redondantes ou incorrectes
// Route::get('consultations/create', [ConsultationController::class, 'create'])->name('consultations.create');
// Route::post('patients/{patient}/consultations', [PatientController::class, 'storeConsultation'])->name('consultations.store');
