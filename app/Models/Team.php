<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];
    protected $fillable = [

        'desgination',
        'full_name',
        'email',
        'phone',
        'address',
        'short_bio',
        'image',
        'linke  din',
        'twitter',
        'facebook',
        'ordering',
        'status',
      
    ];
}
