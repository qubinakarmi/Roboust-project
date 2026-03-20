<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

    protected $fillable = [
        'name',
        'email',
        'address',
        'bio',
        'image',

    ];
}
