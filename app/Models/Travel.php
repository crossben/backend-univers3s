<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'address',
        'passportNumber',
        'passportExpiry',
        'emergencyContact',
        'emergencyPhone',
        'medicalInfo',
        'roomPreference',
        'specialRequests',
        'acceptTerms',
    ];

    protected $casts = [
        'email' => 'string',
        'phone' => 'string',
        'departureDate' => 'date',
        'returnDate' => 'date',
        'destination' => 'string',
        'numberOfTravelers' => 'integer',
        'specialRequests' => 'string',
        'acceptTerms' => 'boolean',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
