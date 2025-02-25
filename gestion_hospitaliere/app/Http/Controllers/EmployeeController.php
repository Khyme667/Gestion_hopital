<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Traits\LogsActivity; // Ajouter le trait
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use LogsActivity; // Utiliser le trait

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|string',
            'role' => 'required|in:Médecin,Infirmier,Administrateur',
        ]);

        $employee = Employee::create($request->all());

        // Journaliser l'action "created"
        $this->logAction('created', Employee::class, $employee->id, "Employé {$employee->name} ajouté");

        return redirect()->route('employees.index')->with('success', 'Employé ajouté avec succès.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|string',
            'role' => 'required|in:Médecin,Infirmier,Administrateur',
        ]);

        $employee->update($request->all());

        // Journaliser l'action "updated"
        $this->logAction('updated', Employee::class, $employee->id, "Employé {$employee->name} mis à jour");

        return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    }

    public function destroy(Employee $employee)
    {
        // Journaliser l'action "deleted" avant suppression
        $this->logAction('deleted', Employee::class, $employee->id, "Employé {$employee->name} supprimé");

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employé supprimé.');
    }
}