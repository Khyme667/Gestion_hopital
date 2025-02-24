<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'schedule',
    ];

    protected $casts = [
        'schedule' => 'array', // Pour gérer les horaires en JSON
    ];
}
