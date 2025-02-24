<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'contact', 'adresse'];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}