<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type',
        'quantite',
        'seuil_min',
        'fournisseur_id'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    // Méthode pour vérifier si le stock est faible
    public function estStockFaible()
    {
        return $this->quantite <= $this->seuil_min;
    }
}