<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Employee;
use App\Traits\LogsActivity; // Ajouter le trait
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    use LogsActivity; // Utiliser le trait

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
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $schedule = Schedule::create($request->all());

        // Journaliser l'action "created"
        $this->logAction('created', Schedule::class, $schedule->id, "Horaire ajouté pour l'employé {$schedule->employee->name} le {$schedule->day}");

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
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $schedule->update($request->all());

        // Journaliser l'action "updated"
        $this->logAction('updated', Schedule::class, $schedule->id, "Horaire mis à jour pour l'employé {$schedule->employee->name} le {$schedule->day}");

        return redirect()->route('schedules.index')->with('success', 'Horaire mis à jour avec succès.');
    }

    public function destroy(Schedule $schedule)
    {
        // Journaliser l'action "deleted" avant suppression
        $this->logAction('deleted', Schedule::class, $schedule->id, "Horaire supprimé pour l'employé {$schedule->employee->name} le {$schedule->day}");

        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Horaire supprimé.');
    }
}