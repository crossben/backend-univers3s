<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'studentName',
        'studentAge',
        'parentName',
        'parentPhone',
        'parentEmail',
        'address',
        'level',
        'previousSchool',
        'medicalInfo',
        'acceptTerms',
    ];

    protected $casts = [
        'acceptTerms' => 'boolean',
    ];
}
