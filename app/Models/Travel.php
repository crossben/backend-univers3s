<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'fullName',
        'email',
        'phone',
        'departureDate',
        'returnDate',
        'destination',
        'numberOfTravelers',
        'specialRequests',
    ];

    protected $casts = [
        'email' => 'string',
        'phone' => 'string',
        'departureDate' => 'date',
        'returnDate' => 'date',
        'destination' => 'string',
        'numberOfTravelers' => 'integer',
        'specialRequests' => 'string',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
