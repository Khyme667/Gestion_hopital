<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsultationController extends Controller
{
    // Afficher la liste des consultations
    public function index()
    {
        $consultations = Consultation::all();
        return view('consultations.index', compact('consultations'));
    }

    // Afficher le formulaire de création d'une consultation
    public function create()
    {
        $patients = Patient::all();
        return view('consultations.create', compact('patients'));
    }

    // Afficher le formulaire de modification d'une consultation
    public function edit(Consultation $consultation)
    {
        $patients = Patient::all();
        return view('consultations.edit', compact('consultation', 'patients'));
    }

    // Supprimer une consultation
    public function destroy(Consultation $consultation)
    {
        // Supprimer les fichiers associés
        if ($consultation->ordonnances) {
            Storage::disk('public')->delete($consultation->ordonnances);
        }

        if ($consultation->prescriptions) {
            Storage::disk('public')->delete($consultation->prescriptions);
        }

        $consultation->delete();
        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée avec succès.');
    }

    // Stocker une nouvelle consultation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'raison' => 'required|string',
            'ordonnances' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'prescriptions' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Gestion des fichiers
        $ordonnancesPath = null;
        if ($request->hasFile('ordonnances')) {
            $ordonnanceFile = $request->file('ordonnances');
            $ordonnancesPath = $ordonnanceFile->storeAs('uploads/ordonnances', time() . '_' . $ordonnanceFile->getClientOriginalName(), 'public');
        }

        $prescriptionsPath = null;
        if ($request->hasFile('prescriptions')) {
            $prescriptionFile = $request->file('prescriptions');
            $prescriptionsPath = $prescriptionFile->storeAs('uploads/prescriptions', time() . '_' . $prescriptionFile->getClientOriginalName(), 'public');
        }

        // Création de la consultation
        Consultation::create([
            'patient_id' => $validated['patient_id'],
            'date' => $validated['date'],
            'raison' => $validated['raison'],
            'ordonnances' => $ordonnancesPath,
            'prescriptions' => $prescriptionsPath,
        ]);

        return redirect()->route('consultations.index')->with('success', 'Consultation ajoutée avec succès.');
    }

    // Mettre à jour une consultation
    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'raison' => 'required|string',
            'ordonnances' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'prescriptions' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Gestion des fichiers ordonnances
        if ($request->hasFile('ordonnances')) {
            if ($consultation->ordonnances) {
                Storage::disk('public')->delete($consultation->ordonnances);
            }
            $ordonnanceFile = $request->file('ordonnances');
            $ordonnancesPath = $ordonnanceFile->storeAs('uploads/ordonnances', time() . '_' . $ordonnanceFile->getClientOriginalName(), 'public');
            $consultation->ordonnances = $ordonnancesPath;
        }

        // Gestion des fichiers prescriptions
        if ($request->hasFile('prescriptions')) {
            if ($consultation->prescriptions) {
                Storage::disk('public')->delete($consultation->prescriptions);
            }
            $prescriptionFile = $request->file('prescriptions');
            $prescriptionsPath = $prescriptionFile->storeAs('uploads/prescriptions', time() . '_' . $prescriptionFile->getClientOriginalName(), 'public');
            $consultation->prescriptions = $prescriptionsPath;
        }

        // Mise à jour des autres champs
        $consultation->patient_id = $validated['patient_id'];
        $consultation->date = $validated['date'];
        $consultation->raison = $validated['raison'];

        $consultation->save();

        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès.');
    }
}
