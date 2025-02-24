<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Consultation;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Afficher la liste des patients
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Afficher le formulaire de création d'un patient
    public function create()
    {
        return view('patients.create');
    }

    // Enregistrer un nouveau patient
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient créer avec succès.');
    }

    // Afficher le formulaire de modification d'un patient
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Mettre à jour les informations d'un patient
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient mise à jour avec succès.');
    }

    // Supprimer un patient
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }

    

    // Afficher les consultations d'un patient
    public function show(Patient $patient)
    {
        $patient->load('consultations');
        return view('patients.show', compact('patient'));
    }

}

