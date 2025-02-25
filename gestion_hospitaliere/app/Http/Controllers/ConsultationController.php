<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Consultation;
use App\Models\Employee;
use App\Traits\LogsActivity; // Ajouter le trait
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class ConsultationController extends Controller
{
    use LogsActivity; // Utiliser le trait

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
        $doctors = Employee::where('role', 'Médecin')->get(); // Filtrer les médecins
        return view('consultations.create', compact('patients', 'doctors'));
    }

    public function edit(Consultation $consultation)
    {
        $patients = Patient::all();
        $doctors = Employee::where('role', 'Médecin')->get();
        return view('consultations.edit', compact('consultation', 'patients', 'doctors'));
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

        // Journaliser l'action "deleted" avant suppression
        $this->logAction('deleted', Consultation::class, $consultation->id, "Consultation du patient {$consultation->patient->name} supprimée");

        $consultation->delete();
        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée avec succès.');
    }

    // Stocker une nouvelle consultation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'raison' => 'required|string',
            'ordonnances' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'prescriptions' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Gestion des fichiers avec chiffrement
        $ordonnancesPath = null;
        if ($request->hasFile('ordonnances')) {
            $ordonnanceFile = $request->file('ordonnances');
            $encryptedContent = Crypt::encrypt(file_get_contents($ordonnanceFile->path()));
            $ordonnancesPath = 'uploads/ordonnances/' . time() . '_' . $ordonnanceFile->getClientOriginalName();
            Storage::disk('public')->put($ordonnancesPath, $encryptedContent);
        }

        $prescriptionsPath = null;
        if ($request->hasFile('prescriptions')) {
            $prescriptionFile = $request->file('prescriptions');
            $encryptedContent = Crypt::encrypt(file_get_contents($prescriptionFile->path()));
            $prescriptionsPath = 'uploads/prescriptions/' . time() . '_' . $prescriptionFile->getClientOriginalName();
            Storage::disk('public')->put($prescriptionsPath, $encryptedContent);
        }

        $consultation = Consultation::create([
            'patient_id' => $validated['patient_id'],
            'employee_id' => $validated['employee_id'],
            'date' => $validated['date'],
            'raison' => $validated['raison'],
            'ordonnances' => $ordonnancesPath,
            'prescriptions' => $prescriptionsPath,
        ]);

        // Journaliser l'action "created"
        $this->logAction('created', Consultation::class, $consultation->id, "Consultation créée pour le patient {$consultation->patient->name}");

        return redirect()->route('consultations.index')->with('success', 'Consultation ajoutée avec succès.');
    }

    // Mettre à jour une consultation
    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'raison' => 'required|string',
            'ordonnances' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'prescriptions' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Gestion des fichiers avec chiffrement
        if ($request->hasFile('ordonnances')) {
            if ($consultation->ordonnances) {
                Storage::disk('public')->delete($consultation->ordonnances);
            }
            $ordonnanceFile = $request->file('ordonnances');
            $encryptedContent = Crypt::encrypt(file_get_contents($ordonnanceFile->path()));
            $ordonnancesPath = 'uploads/ordonnances/' . time() . '_' . $ordonnanceFile->getClientOriginalName();
            Storage::disk('public')->put($ordonnancesPath, $encryptedContent);
            $consultation->ordonnances = $ordonnancesPath;
        }

        if ($request->hasFile('prescriptions')) {
            if ($consultation->prescriptions) {
                Storage::disk('public')->delete($consultation->prescriptions);
            }
            $prescriptionFile = $request->file('prescriptions');
            $encryptedContent = Crypt::encrypt(file_get_contents($prescriptionFile->path()));
            $prescriptionsPath = 'uploads/prescriptions/' . time() . '_' . $prescriptionFile->getClientOriginalName();
            Storage::disk('public')->put($prescriptionsPath, $encryptedContent);
            $consultation->prescriptions = $prescriptionsPath;
        }

        $consultation->patient_id = $validated['patient_id'];
        $consultation->employee_id = $validated['employee_id'];
        $consultation->date = $validated['date'];
        $consultation->raison = $validated['raison'];
        $consultation->save();

        // Journaliser l'action "updated"
        $this->logAction('updated', Consultation::class, $consultation->id, "Consultation du patient {$consultation->patient->name} mise à jour");

        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès.');
    }

    // Méthode pour télécharger les fichiers déchiffrés
    public function download(Request $request, Consultation $consultation, $type)
    {
        $filePath = $type === 'ordonnances' ? $consultation->ordonnances : $consultation->prescriptions;

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            $encryptedContent = Storage::disk('public')->get($filePath);
            $decryptedContent = Crypt::decrypt($encryptedContent);
            return response($decryptedContent)
                ->header('Content-Type', 'application/octet-stream')
                ->header('Content-Disposition', 'attachment; filename="' . basename($filePath) . '"');
        }

        return redirect()->back()->with('error', 'Fichier non trouvé.');
    }
}