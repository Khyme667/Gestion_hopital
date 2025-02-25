<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Fournisseur;
use App\Traits\LogsActivity; // Ajouter le trait
use Illuminate\Http\Request;

class StockController extends Controller
{
    use LogsActivity; // Utiliser le trait

    public function index()
    {
        // Afficher tous les stocks
        $stocks = Stock::with('fournisseur')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        // Afficher le formulaire d'ajout de stock
        $fournisseurs = Fournisseur::all();
        return view('stocks.create', compact('fournisseurs'));
    }

    public function store(Request $request)
    {
        // Valider et enregistrer un nouvel produit
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|in:médicament,équipement',
            'quantite' => 'required|integer|min:0',
            'seuil_min' => 'required|integer|min:1',
            'fournisseur_id' => 'nullable|exists:fournisseurs,id',
        ]);

        $stock = Stock::create($validated);

        // Journaliser l'action "created"
        $this->logAction('created', Stock::class, $stock->id, "Ajout de : {$stock->nom} de type {$stock->type}, quantité: {$stock->quantite}");

        return redirect()->route('stocks.index')->with('success', 'Article ajouté au stock.');
    }

    public function edit(Stock $stock)
    {
        // Afficher le formulaire de modification de stock
        $fournisseurs = Fournisseur::all();
        return view('stocks.edit', compact('stock', 'fournisseurs'));
    }

    public function update(Request $request, Stock $stock)
    {
        // Valider et mettre à jour le produit
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|in:médicament,équipement',
            'quantite' => 'required|integer|min:0',
            'seuil_min' => 'required|integer|min:1',
            'fournisseur_id' => 'nullable|exists:fournisseurs,id',
        ]);

        $stock->update($validated);

        // Journaliser l'action "updated"
        $this->logAction('updated', Stock::class, $stock->id, "modification: {$stock->nom} de type {$stock->type}, quantité: {$stock->quantite}");

        return redirect()->route('stocks.index')->with('success', 'Stock mis à jour.');
    }

    public function destroy(Stock $stock)
    {
        // Journaliser l'action "deleted" avant suppression
        $this->logAction('deleted', Stock::class, $stock->id, "{$stock->nom} Supprimé");

        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Article supprimé du stock.');
    }
}