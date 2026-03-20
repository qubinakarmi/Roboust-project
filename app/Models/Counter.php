<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
    protected $fillable = [
        'title',
        'description',
        'number',
        'prefix',
        'suffix',
        'icon',
        'status',
    ];
}
