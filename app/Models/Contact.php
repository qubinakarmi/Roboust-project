<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'subject',
        'description',

    ];
}
