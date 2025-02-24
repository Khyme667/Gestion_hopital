<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Inclure les routes d'authentification de Breeze
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('admin')->group(function () {
    Route::resource('patients', PatientController::class);
});

// Route::middleware(['auth'])->group(function () {
//     Route::resource('consultations', ConsultationController::class)->middleware('can:manage-consultations');
//     Route::resource('employees', EmployeeController::class)->middleware('can:manage-consultations');
//     Route::resource('schedules', ScheduleController::class)->middleware('can:manage-consultations');
//     Route::resource('stocks', StockController::class)->middleware('can:manage-stocks');
//     Route::resource('fournisseurs', FournisseurController::class)->middleware('can:manage-stocks');
//     // Exemple pour une route de gestion des utilisateurs (à implémenter)
//     // Route::get('/users', [UserController::class, 'index'])->middleware('can:manage-users');
// });



Route::resource('consultations', ConsultationController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('stocks', StockController::class);
Route::resource('fournisseurs', FournisseurController::class);