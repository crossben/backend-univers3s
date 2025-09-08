<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'email',
        'service',
    ];

    protected $casts = [
        'email' => 'string',
        'service' => 'string',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
