<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'phone',
        'address',
        'medical_history'
    ];

    // Relation avec le modèle Consultation
    public function consultations()
    {
        return $this->hasMany(Consultation::class); // Un patient peut avoir plusieurs consultations
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }
}

