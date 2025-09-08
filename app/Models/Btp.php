<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Btp extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'projectType',
        'description',
        'budget',
        'timeline',
    ];

    protected $casts = [
        'email' => 'string',
        'phone' => 'string',
        'projectType' => 'string',
        'description' => 'string',
        'budget' => 'string',
        'timeline' => 'string',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
