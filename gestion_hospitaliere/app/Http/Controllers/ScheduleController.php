<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Employee;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Afficher tous les horaires
        $schedules = Schedule::with('employee')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        // Afficher le formulaire d'ajout des horaires
        $employees = Employee::all();
        return view('schedules.create', compact('employees'));
    }

    public function store(Request $request)
    {
        // Valider et enregistrer un nouvel horaire
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Horaire ajouté avec succès.');
    }

    public function edit(Schedule $schedule)
    {
        // Afficher le formulaire de modification des horaires
        $employees = Employee::all();
        return view('schedules.edit', compact('schedule', 'employees'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        // Valider et mettre à jour l'horaire
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('success', 'Horaire mis à jour avec succès.');
    }

    public function destroy(Schedule $schedule)
    {
        // Supprimer un horaire
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Horaire supprimé.');
    }
}
