<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Employee;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    use LogsActivity;

    public function index()
    {
        $rendezVous = RendezVous::with('patient')->get();
        $doctors = Employee::where('role', 'Médecin')->get(); // Charger les médecins ici
        return view('rendez-vous.index', compact('rendezVous', 'doctors'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('rendez-vous.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date_rendez_vous' => 'required|date|after:today',
            'raison' => 'required|string|max:255',
        ]);

        $rendezVous = RendezVous::create($validated);

        $this->logAction('created', RendezVous::class, $rendezVous->id, "Rendez-vous créé pour le patient {$rendezVous->patient_id}");
        return redirect()->route('rendez-vous.index')->with('success', 'Rendez-vous ajouté avec succès.');
    }

    public function edit(RendezVous $rendezVous)
    {
        $patients = Patient::all();
        return view('rendez-vous.edit', compact('rendezVous', 'patients'));
    }

    public function update(Request $request, RendezVous $rendezVous)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date_rendez_vous' => 'required|date|after:today',
            'raison' => 'required|string|max:255',
            'status' => 'required|in:en_attente,confirme,annule',
        ]);

        $rendezVous->update($validated);

        $this->logAction('updated', RendezVous::class, $rendezVous->id, "Rendez-vous mis à jour pour le patient {$rendezVous->patient_id}");
        return redirect()->route('rendez-vous.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    public function destroy(RendezVous $rendezVous)
    {
        $this->logAction('deleted', RendezVous::class, $rendezVous->id, "Rendez-vous supprimé pour le patient {$rendezVous->patient_id}");
        $rendezVous->delete();
        return redirect()->route('rendez-vous.index')->with('success', 'Rendez-vous supprimé.');
    }

    public function confirm(Request $request, RendezVous $rendezVous)
    {
        // Valider les données supplémentaires nécessaires pour la consultation
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id', // Médecin requis
        ]);

        $rendezVous->update(['status' => 'confirme']);
        $rendezVous->load('patient');

        // Créer une consultation associée
        $consultation = Consultation::create([
            'patient_id' => $rendezVous->patient_id,
            'employee_id' => $validated['employee_id'],
            'date' => $rendezVous->date_rendez_vous,
            'raison' => $rendezVous->raison,
            'rendez_vous_id' => $rendezVous->id,
        ]);

        $this->logAction('confirmed', RendezVous::class, $rendezVous->id, "Rendez-vous confirmé pour le patient " . ($rendezVous->patient ? $rendezVous->patient->name : $rendezVous->patient_id));
        $this->logAction('created', Consultation::class, $consultation->id, "Consultation créée à partir du rendez-vous {$rendezVous->id}");

        return redirect()->route('rendez-vous.index')->with('success', 'Rendez-vous confirmé et consultation créée.');
    }

    public function cancel(RendezVous $rendezVous)
    {
        $rendezVous->update(['status' => 'annule']);
        $this->logAction('canceled', RendezVous::class, $rendezVous->id, "Rendez-vous annulé pour le patient {$rendezVous->patient_id}");
        return redirect()->route('rendez-vous.index')->with('success', 'Rendez-vous annulé.');
    }
}