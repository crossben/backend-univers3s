<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'sujet',
        'message',
    ];

    protected $casts = [
        'email' => 'string',
        'telephone' => 'string',
        'sujet' => 'string',
        'message' => 'string',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
