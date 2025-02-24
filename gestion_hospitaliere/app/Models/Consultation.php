<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'date', 'raison', 'ordonnances', 'prescriptions'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

