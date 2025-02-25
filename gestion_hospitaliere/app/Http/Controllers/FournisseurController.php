<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Traits\LogsActivity; // Ajouter le trait
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    use LogsActivity; // Utiliser le trait

    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        return view('fournisseurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
        ]);

        $fournisseur = Fournisseur::create($validated);

        // Journaliser l'action "created"
        $this->logAction('created', Fournisseur::class, $fournisseur->id, "Fournisseur {$fournisseur->nom} ajouté");

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouté avec succès.');
    }

    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
        ]);

        $fournisseur->update($validated);

        // Journaliser l'action "updated"
        $this->logAction('updated', Fournisseur::class, $fournisseur->id, "Fournisseur {$fournisseur->nom} mis à jour");

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour avec succès.');
    }

    public function destroy(Fournisseur $fournisseur)
    {
        // Journaliser l'action "deleted" avant suppression
        $this->logAction('deleted', Fournisseur::class, $fournisseur->id, "Fournisseur {$fournisseur->nom} supprimé");

        $fournisseur->delete();
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimé avec succès.');
    }
}