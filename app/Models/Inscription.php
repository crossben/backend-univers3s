<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'studentName',        // string
        'studentAge',         // integer, nullable
        'parentName',         // string
        'parentPhone',        // string
        'parentEmail',        // string
        'address',            // string
        'level',              // string
        'previousSchool',     // string, nullable
        'medicalInfo',        // text, nullable
        'acceptTerms',        // boolean, default false
    ];

    protected $casts = [
        'acceptTerms' => 'boolean',
    ];
}
