<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('fournisseur')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        return view('stocks.create', compact('fournisseurs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|in:médicament,équipement',
            'quantite' => 'required|integer|min:0',
            'seuil_min' => 'required|integer|min:1',
            'fournisseur_id' => 'nullable|exists:fournisseurs,id',
        ]);

        Stock::create($validated);

        return redirect()->route('stocks.index')->with('success', 'Article ajouté au stock.');
    }

    public function edit(Stock $stock)
    {
        $fournisseurs = Fournisseur::all();
        return view('stocks.edit', compact('stock', 'fournisseurs'));
    }

    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|in:médicament,équipement',
            'quantite' => 'required|integer|min:0',
            'seuil_min' => 'required|integer|min:1',
            'fournisseur_id' => 'nullable|exists:fournisseurs,id',
        ]);

        $stock->update($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock mis à jour.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Article supprimé du stock.');
    }
}