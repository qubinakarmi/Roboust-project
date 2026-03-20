<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
    protected $fillable = [
        'title',
        'image',
        'status',
    ];
}
